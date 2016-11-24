<?php 
function indexing($url){
include('config.php');
include('extract_css_urls.php');
include('adders.php');
require "split_url.php";
require "join_url.php";
/////////////////////////////////////////////////////////////////////////////////////////////////////////
domainadd($url);
$time=time();
$result = get_web_page( $url );
$encodedText = $result['content'];

$contentType = $result['content_type'];
preg_match( '@([\w/+]+)(;\s+charset=(\S+))?@i', $contentType, $matches );
$charset = $matches[3];
$text = iconv( $charset, "utf-8", $encodedText );
extract_html_urls($text);
$text2 = strip_html_tags( $text);
$text = html_entity_decode( $text2, ENT_QUOTES, "utf-8" );
$text = strip_punctuation( $text );
$text = strip_symbols( $text );
$text = strip_numbers( $text );
$text = mb_strtolower( $text, "utf-8" );
mb_regex_encoding( "utf-8" );
$words = mb_split( ' +', $text );
$keywordCounts = array_count_values( $words );
arsort( $keywordCounts, SORT_NUMERIC );
$uniqueKeywords = array_keys( $keywordCounts );
$count=count($uniqueKeywords);
$i=$count-1;
$j=0;
while($j<$i){
$key=$uniqueKeywords[$j];
$text2=trim($text2);
keywordadd($key, $url);
$j++;
}
include_once ('crawler.php');
$uree=$url;
$target_url = $uree;
$html = new simple_html_dom();
$html->load_file($target_url);
$host=parse_url($url, PHP_URL_HOST);
foreach($html->find('img') as $link){
$imgl=$link->src;
$host2=parse_url($imgl, PHP_URL_HOST);
if(strlen($host2)<4){
$url=$uree;
imageadd($imgl, $url);
}
}
foreach($html->find('a') as $link){
$urldo=$link->href;
$url=$uree;
$ur=$url;
$rur=$urldo;

$absur=url_to_absolute($ur, $rur);
linkadd($absur, $url);
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

function url_to_absolute( $baseUrl, $relativeUrl )
{
	// If relative URL has a scheme, clean path and return.
	$r = split_url($relativeUrl);
	if ( $r === FALSE )
		return FALSE;
	if ( !empty( $r['scheme'] ) )
	{
		if ( !empty( $r['path'] ) && $r['path'][0] == '/' )
			$r['path'] = url_remove_dot_segments( $r['path'] );
		return join_url( $r );
	}

	// Make sure the base URL is absolute.
	$b = split_url($baseUrl);
	if ( $b === FALSE || empty( $b['scheme'] ) || empty( $b['host'] ) )
		return FALSE;
	$r['scheme'] = $b['scheme'];

	// If relative URL has an authority, clean path and return.
	if ( isset( $r['host'] ) )
	{
		if ( !empty( $r['path'] ) )
			$r['path'] = url_remove_dot_segments( $r['path'] );
		return join_url( $r );
	}
	unset( $r['port'] );
	unset( $r['user'] );
	unset( $r['pass'] );

	// Copy base authority.
	$r['host'] = $b['host'];
	if ( isset( $b['port'] ) ) $r['port'] = $b['port'];
	if ( isset( $b['user'] ) ) $r['user'] = $b['user'];
	if ( isset( $b['pass'] ) ) $r['pass'] = $b['pass'];

	// If relative URL has no path, use base path
	if ( empty( $r['path'] ) )
	{
		if ( !empty( $b['path'] ) )
			$r['path'] = $b['path'];
		if ( !isset( $r['query'] ) && isset( $b['query'] ) )
			$r['query'] = $b['query'];
		return join_url( $r );
	}

	// If relative URL path doesn't start with /, merge with base path
	if ( $r['path'][0] != '/' )
	{
		$base = mb_strrchr( $b['path'], '/', TRUE, 'UTF-8' );
		if ( $base === FALSE ) $base = '';
		$r['path'] = $base . '/' . $r['path'];
	}
	$r['path'] = url_remove_dot_segments( $r['path'] );
	return join_url( $r );
}

/**
 * Filter out "." and ".." segments from a URL's path and return
 * the result.
 *
 * This function implements the "remove_dot_segments" algorithm from
 * the RFC3986 specification for URLs.
 *
 * This function supports multi-byte characters with the UTF-8 encoding,
 * per the URL specification.
 *
 * Parameters:
 * 	path	the path to filter
 *
 * Return values:
 * 	The filtered path with "." and ".." removed.
 */
function url_remove_dot_segments( $path )
{
	// multi-byte character explode
	$inSegs  = preg_split( '!/!u', $path );
	$outSegs = array( );
	foreach ( $inSegs as $seg )
	{
		if ( $seg == '' || $seg == '.')
			continue;
		if ( $seg == '..' )
			array_pop( $outSegs );
		else
			array_push( $outSegs, $seg );
	}
	$outPath = implode( '/', $outSegs );
	if ( $path[0] == '/' )
		$outPath = '/' . $outPath;
	// compare last multi-byte character against '/'
	if ( $outPath != '/' &&
		(mb_strlen($path)-1) == mb_strrpos( $path, '/', 'UTF-8' ) )
		$outPath .= '/';
	return $outPath;
}



////////////////////////////////////////


function get_web_page( $url )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "iunvTexter", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}

function strip_numbers( $text )
{
    $urlchars      = '\.,:;\'=+\-_\*%@&\/\\\\?!#~\[\]\(\)';
    $notdelim      = '\p{L}\p{M}\p{N}\p{Pc}\p{Pd}' . $urlchars;
    $predelim      = '((?<=[^' . $notdelim . '])|^)';
    $postdelim     = '((?=[^'  . $notdelim . '])|$)';
 
    $fullstop      = '\x{002E}\x{FE52}\x{FF0E}';
    $comma         = '\x{002C}\x{FE50}\x{FF0C}';
    $arabsep       = '\x{066B}\x{066C}';
    $numseparators = $fullstop . $comma . $arabsep;
    $plus          = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
    $minus         = '\x{2212}\x{208B}\x{207B}\p{Pd}';
    $slash         = '[\/\x{2044}]';
    $colon         = ':\x{FE55}\x{FF1A}\x{2236}';
    $units         = '%\x{FF05}\x{FE64}\x{2030}\x{2031}';
    $units        .= '\x{00B0}\x{2103}\x{2109}\x{23CD}';
    $units        .= '\x{32CC}-\x{32CE}';
    $units        .= '\x{3300}-\x{3357}';
    $units        .= '\x{3371}-\x{33DF}';
    $units        .= '\x{33FF}';
    $percents      = '%\x{FE64}\x{FF05}\x{2030}\x{2031}';
    $ampm          = '([aApP][mM])';
 
    $digits        = '[\p{N}' . $numseparators . ']+';
    $sign          = '[' . $plus . $minus . ']?';
    $exponent      = '([eE]' . $sign . $digits . ')?';
    $prenum        = $sign . '[\p{Sc}#]?' . $sign;
    $postnum       = '([\p{Sc}' . $units . $percents . ']|' . $ampm . ')?';
    $number        = $prenum . $digits . $exponent . $postnum;
    $fraction      = $number . '(' . $slash . $number . ')?';
    $numpair       = $fraction . '([' . $minus . $colon . $fullstop . ']' .
        $fraction . ')*';
 
    return preg_replace(
        array(
        // Match delimited numbers
            '/' . $predelim . $numpair . $postdelim . '/u',
        // Match consecutive white space
            '/ +/u',
        ),
        ' ',
        $text );
}


function strip_symbols( $text )
{
    $plus   = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
    $minus  = '\x{2012}\x{208B}\x{207B}';
 
    $units  = '\\x{00B0}\x{2103}\x{2109}\\x{23CD}';
    $units .= '\\x{32CC}-\\x{32CE}';
    $units .= '\\x{3300}-\\x{3357}';
    $units .= '\\x{3371}-\\x{33DF}';
    $units .= '\\x{33FF}';
 
    $ideo   = '\\x{2E80}-\\x{2EF3}';
    $ideo  .= '\\x{2F00}-\\x{2FD5}';
    $ideo  .= '\\x{2FF0}-\\x{2FFB}';
    $ideo  .= '\\x{3037}-\\x{303F}';
    $ideo  .= '\\x{3190}-\\x{319F}';
    $ideo  .= '\\x{31C0}-\\x{31CF}';
    $ideo  .= '\\x{32C0}-\\x{32CB}';
    $ideo  .= '\\x{3358}-\\x{3370}';
    $ideo  .= '\\x{33E0}-\\x{33FE}';
    $ideo  .= '\\x{A490}-\\x{A4C6}';
 
    return preg_replace(
        array(
        // Remove modifier and private use symbols.
            '/[\p{Sk}\p{Co}]/u',
        // Remove mathematics symbols except + - = ~ and fraction slash
            '/\p{Sm}(?<![' . $plus . $minus . '=~\x{2044}])/u',
        // Remove + - if space before, no number or currency after
            '/((?<= )|^)[' . $plus . $minus . ']+((?![\p{N}\p{Sc}])|$)/u',
        // Remove = if space before
            '/((?<= )|^)=+/u',
        // Remove + - = ~ if space after
            '/[' . $plus . $minus . '=~]+((?= )|$)/u',
        // Remove other symbols except units and ideograph parts
            '/\p{So}(?<![' . $units . $ideo . '])/u',
        // Remove consecutive white space
            '/ +/',
        ),
        ' ',
        $text );
}

function strip_punctuation( $text )
{
    $urlbrackets    = '\[\]\(\)';
    $urlspacebefore = ':;\'_\*%@&?!' . $urlbrackets;
    $urlspaceafter  = '\.,:;\'\-_\*@&\/\\\\\?!#' . $urlbrackets;
    $urlall         = '\.,:;\'\-_\*%@&\/\\\\\?!#' . $urlbrackets;
 
    $specialquotes  = '\'"\*<>';
 
    $fullstop       = '\x{002E}\x{FE52}\x{FF0E}';
    $comma          = '\x{002C}\x{FE50}\x{FF0C}';
    $arabsep        = '\x{066B}\x{066C}';
    $numseparators  = $fullstop . $comma . $arabsep;
 
    $numbersign     = '\x{0023}\x{FE5F}\x{FF03}';
    $percent        = '\x{066A}\x{0025}\x{066A}\x{FE6A}\x{FF05}\x{2030}\x{2031}';
    $prime          = '\x{2032}\x{2033}\x{2034}\x{2057}';
    $nummodifiers   = $numbersign . $percent . $prime;
 
    return preg_replace(
        array(
        // Remove separator, control, formatting, surrogate,
        // open/close quotes.
            '/[\p{Z}\p{Cc}\p{Cf}\p{Cs}\p{Pi}\p{Pf}]/u',
        // Remove other punctuation except special cases
            '/\p{Po}(?<![' . $specialquotes .
                $numseparators . $urlall . $nummodifiers . '])/u',
        // Remove non-URL open/close brackets, except URL brackets.
            '/[\p{Ps}\p{Pe}](?<![' . $urlbrackets . '])/u',
        // Remove special quotes, dashes, connectors, number
        // separators, and URL characters followed by a space
            '/[' . $specialquotes . $numseparators . $urlspaceafter .
                '\p{Pd}\p{Pc}]+((?= )|$)/u',
        // Remove special quotes, connectors, and URL characters
        // preceded by a space
            '/((?<= )|^)[' . $specialquotes . $urlspacebefore . '\p{Pc}]+/u',
        // Remove dashes preceded by a space, but not followed by a number
            '/((?<= )|^)\p{Pd}+(?![\p{N}\p{Sc}])/u',
        // Remove consecutive spaces
            '/ +/',
        ),
        ' ',
        $text );
}

function extract_html_urls( $text )
{
    $match_elements = array(
        // HTML
        array('element'=>'a',       'attribute'=>'href'),       // 2.0
        array('element'=>'a',       'attribute'=>'urn'),        // 2.0
        array('element'=>'base',    'attribute'=>'href'),       // 2.0
        array('element'=>'form',    'attribute'=>'action'),     // 2.0
        array('element'=>'img',     'attribute'=>'src'),        // 2.0
        array('element'=>'link',    'attribute'=>'href'),       // 2.0
 
        array('element'=>'applet',  'attribute'=>'code'),       // 3.2
        array('element'=>'applet',  'attribute'=>'codebase'),   // 3.2
        array('element'=>'area',    'attribute'=>'href'),       // 3.2
        array('element'=>'body',    'attribute'=>'background'), // 3.2
        array('element'=>'img',     'attribute'=>'usemap'),     // 3.2
        array('element'=>'input',   'attribute'=>'src'),        // 3.2
 
        array('element'=>'applet',  'attribute'=>'archive'),    // 4.01
        array('element'=>'applet',  'attribute'=>'object'),     // 4.01
        array('element'=>'blockquote','attribute'=>'cite'),     // 4.01
        array('element'=>'del',     'attribute'=>'cite'),       // 4.01
        array('element'=>'frame',   'attribute'=>'longdesc'),   // 4.01
        array('element'=>'frame',   'attribute'=>'src'),        // 4.01
        array('element'=>'head',    'attribute'=>'profile'),    // 4.01
        array('element'=>'iframe',  'attribute'=>'longdesc'),   // 4.01
        array('element'=>'iframe',  'attribute'=>'src'),        // 4.01
        array('element'=>'img',     'attribute'=>'longdesc'),   // 4.01
        array('element'=>'input',   'attribute'=>'usemap'),     // 4.01
        array('element'=>'ins',     'attribute'=>'cite'),       // 4.01
        array('element'=>'object',  'attribute'=>'archive'),    // 4.01
        array('element'=>'object',  'attribute'=>'classid'),    // 4.01
        array('element'=>'object',  'attribute'=>'codebase'),   // 4.01
        array('element'=>'object',  'attribute'=>'data'),       // 4.01
        array('element'=>'object',  'attribute'=>'usemap'),     // 4.01
        array('element'=>'q',       'attribute'=>'cite'),       // 4.01
        array('element'=>'script',  'attribute'=>'src'),        // 4.01
 
        array('element'=>'audio',   'attribute'=>'src'),        // 5.0
        array('element'=>'command', 'attribute'=>'icon'),       // 5.0
        array('element'=>'embed',   'attribute'=>'src'),        // 5.0
        array('element'=>'event-source','attribute'=>'src'),    // 5.0
        array('element'=>'html',    'attribute'=>'manifest'),   // 5.0
        array('element'=>'source',  'attribute'=>'src'),        // 5.0
        array('element'=>'video',   'attribute'=>'src'),        // 5.0
        array('element'=>'video',   'attribute'=>'poster'),     // 5.0
 
        array('element'=>'bgsound', 'attribute'=>'src'),        // Extension
        array('element'=>'body',    'attribute'=>'credits'),    // Extension
        array('element'=>'body',    'attribute'=>'instructions'),//Extension
        array('element'=>'body',    'attribute'=>'logo'),       // Extension
        array('element'=>'div',     'attribute'=>'href'),       // Extension
        array('element'=>'div',     'attribute'=>'src'),        // Extension
        array('element'=>'embed',   'attribute'=>'code'),       // Extension
        array('element'=>'embed',   'attribute'=>'pluginspage'),// Extension
        array('element'=>'html',    'attribute'=>'background'), // Extension
        array('element'=>'ilayer',  'attribute'=>'src'),        // Extension
        array('element'=>'img',     'attribute'=>'dynsrc'),     // Extension
        array('element'=>'img',     'attribute'=>'lowsrc'),     // Extension
        array('element'=>'input',   'attribute'=>'dynsrc'),     // Extension
        array('element'=>'input',   'attribute'=>'lowsrc'),     // Extension
        array('element'=>'table',   'attribute'=>'background'), // Extension
        array('element'=>'td',      'attribute'=>'background'), // Extension
        array('element'=>'th',      'attribute'=>'background'), // Extension
        array('element'=>'layer',   'attribute'=>'src'),        // Extension
        array('element'=>'xml',     'attribute'=>'src'),        // Extension
 
        array('element'=>'button',  'attribute'=>'action'),     // Forms 2.0
        array('element'=>'datalist','attribute'=>'data'),       // Forms 2.0
        array('element'=>'form',    'attribute'=>'data'),       // Forms 2.0
        array('element'=>'input',   'attribute'=>'action'),     // Forms 2.0
        array('element'=>'select',  'attribute'=>'data'),       // Forms 2.0
 
        // XHTML
        array('element'=>'html',    'attribute'=>'xmlns'),
 
        // WML
        array('element'=>'access',  'attribute'=>'path'),       // 1.3
        array('element'=>'card',    'attribute'=>'onenterforward'),// 1.3
        array('element'=>'card',    'attribute'=>'onenterbackward'),// 1.3
        array('element'=>'card',    'attribute'=>'ontimer'),    // 1.3
        array('element'=>'go',      'attribute'=>'href'),       // 1.3
        array('element'=>'option',  'attribute'=>'onpick'),     // 1.3
        array('element'=>'template','attribute'=>'onenterforward'),// 1.3
        array('element'=>'template','attribute'=>'onenterbackward'),// 1.3
        array('element'=>'template','attribute'=>'ontimer'),    // 1.3
        array('element'=>'wml',     'attribute'=>'xmlns'),      // 2.0
    );
 
    $match_metas = array(
        'content-base',
        'content-location',
        'referer',
        'location',
        'refresh',
    );
 
    // Extract all elements
    if ( !preg_match_all( '/<([a-z][^>]*)>/iu', $text, $matches ) )
        return array( );
    $elements = $matches[1];
    $value_pattern = '=(("([^"]*)")|([^\s]*))';
 
    // Match elements and attributes
    foreach ( $match_elements as $match_element )
    {
        $name = $match_element['element'];
        $attr = $match_element['attribute'];
        $pattern = '/^' . $name . '\s.*' . $attr . $value_pattern . '/iu';
        if ( $name == 'object' )
            $split_pattern = '/\s*/u';  // Space-separated URL list
        else if ( $name == 'archive' )
            $split_pattern = '/,\s*/u'; // Comma-separated URL list
        else
            unset( $split_pattern );    // Single URL
        foreach ( $elements as $element )
        {
            if ( !preg_match( $pattern, $element, $match ) )
                continue;
            $m = empty($match[3]) ? $match[4] : $match[3];
            if ( !isset( $split_pattern ) )
                $urls[$name][$attr][] = $m;
            else
            {
                $msplit = preg_split( $split_pattern, $m );
                foreach ( $msplit as $ms )
                    $urls[$name][$attr][] = $ms;
            }
        }
    }
 
    // Match meta http-equiv elements
    foreach ( $match_metas as $match_meta )
    {
        $attr_pattern    = '/http-equiv="?' . $match_meta . '"?/iu';
        $content_pattern = '/content'  . $value_pattern . '/iu';
        $refresh_pattern = '/\d*;\s*(url=)?(.*)$/iu';
        foreach ( $elements as $element )
        {
            if ( !preg_match( '/^meta/iu', $element ) ||
                !preg_match( $attr_pattern, $element ) ||
                !preg_match( $content_pattern, $element, $match ) )
                continue;
            $m = empty($match[3]) ? $match[4] : $match[3];
            if ( $match_meta != 'refresh' )
                $urls['meta']['http-equiv'][] = $m;
            else if ( preg_match( $refresh_pattern, $m, $match ) )
                $urls['meta']['http-equiv'][] = $match[2];
        }
    }
 
    // Match style attributes
    $urls['style'] = array( );
    $style_pattern = '/style' . $value_pattern . '/iu';
    foreach ( $elements as $element )
    {
        if ( !preg_match( $style_pattern, $element, $match ) )
            continue;
        $m = empty($match[3]) ? $match[4] : $match[3];
        $style_urls = extract_css_urls( $m );
        if ( !empty( $style_urls ) )
            $urls['style'] = array_merge_recursive(
                $urls['style'], $style_urls );
    }
 
    // Match style bodies
    if ( preg_match_all( '/<style[^>]*>(.*?)<\/style>/siu', $text, $style_bodies ) )
    {
        foreach ( $style_bodies[1] as $style_body )
        {
            $style_urls = extract_css_urls( $style_body );
            if ( !empty( $style_urls ) )
                $urls['style'] = array_merge_recursive(
                    $urls['style'], $style_urls );
        }
    }
    if ( empty($urls['style']) )
        unset( $urls['style'] );
 
    return $urls;
}


function strip_html_tags( $text )
{
    $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
        ),
        $text );
    return strip_tags( $text );
}




?>