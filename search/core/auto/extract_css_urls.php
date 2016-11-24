<?php
/**
 * Copyright (c) 2008, David R. Nadeau, NadeauSoftware.com.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *	* Redistributions of source code must retain the above copyright
 *	  notice, this list of conditions and the following disclaimer.
 *
 *	* Redistributions in binary form must reproduce the above
 *	  copyright notice, this list of conditions and the following
 *	  disclaimer in the documentation and/or other materials provided
 *	  with the distribution.
 *
 *	* Neither the names of David R. Nadeau or NadeauSoftware.com, nor
 *	  the names of its contributors may be used to endorse or promote
 *	  products derived from this software without specific prior
 *	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY
 * WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
 * OF SUCH DAMAGE.
 */

/*
 * This is a BSD License approved by the Open Source Initiative (OSI).
 * See:  http://www.opensource.org/licenses/bsd-license.php
 */


/**
 * Extract URLs from UTF-8 CSS text.
 *
 * URLs within @import statements and url() property functions are extracted
 * and returned in an associative array of arrays.  Array keys indicate
 * the use context for the URL, including:
 *
 * 	"import"
 * 	"property"
 *
 * Each value in the associative array is an array of URLs.
 *
 * Parameters:
 * 	text		the UTF-8 text to scan
 *
 * Return values:
 * 	an associative array of arrays of URLs.
 *
 * See:
 * 	http://nadeausoftware.com/articles/2008/01/php_tip_how_extract_urls_css_file
 */
function extract_css_urls( $text )
{
	$urls = array( );

	$url_pattern     = '(([^\\\\\'", \(\)]*(\\\\.)?)+)';
	$urlfunc_pattern = 'url\(\s*[\'"]?' . $url_pattern . '[\'"]?\s*\)';
	$pattern         = '/(' .
		 '(@import\s*[\'"]' . $url_pattern     . '[\'"])' .
		'|(@import\s*'      . $urlfunc_pattern . ')'      .
		'|('                . $urlfunc_pattern . ')'      .  ')/iu';
	if ( !preg_match_all( $pattern, $text, $matches ) )
		return $urls;

	// @import '...'
	// @import "..."
	foreach ( $matches[3] as $match )
		if ( !empty($match) )
			$urls['import'][] = 
				preg_replace( '/\\\\(.)/u', '\\1', $match );

	// @import url(...)
	// @import url('...')
	// @import url("...")
	foreach ( $matches[7] as $match )
		if ( !empty($match) )
			$urls['import'][] = 
				preg_replace( '/\\\\(.)/u', '\\1', $match );

	// url(...)
	// url('...')
	// url("...")
	foreach ( $matches[11] as $match )
		if ( !empty($match) )
			$urls['property'][] = 
				preg_replace( '/\\\\(.)/u', '\\1', $match );

	return $urls;
}

?>
