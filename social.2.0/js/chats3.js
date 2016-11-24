<script>
$(document).keypress(function(event) {
    if(event.which == 13) {
var id=$(event.target).attr("name");
        cSend(id);
    }
});
window.setInterval(function(){cCheck();}, 2307);
window.setInterval(function(){getChatters();}, 12021);
window.setInterval(function(){chatterNum();}, 8003);

$('#wChatMain').load('chat');

function dockChat(){
chatterNum();
$('#chatPeople').load('modules/chat/chat_people.php');
$('#chatBarOut').slideDown(250);
$('#chatBarRoot').attr('onclick', 'undockChat();');
}

function undockChat(){
$('#chatBarOut').slideUp(250);
$('#chatBarRoot').attr('onclick', 'dockChat();');
}
function chatterNum(){
$.ajax({
 type: "POST",
 url: "modules/chat/chat_num.php",
 data: {anu:'bhav'}
 }).done(function( result ) {
var res=result;
if(res!='Error'){
$('#chatBarRootNumOnline').empty().append(res);
}
 });
}
function getChatters(){
$('#chatPeople').load('modules/chat/chat_people.php');
}
window.onbeforeunload = function() {chat_off_temp();};

function chat_off(){
$('#chatStatus').removeClass('On').addClass('Pen');
 $.ajax({
 type: "POST",
 url: "modules/chat/chat_off.php",
 data: {anu:"bhav"}
 }).done(function( result ) {
var res=result;
if(res=='ok'){
$('#chatStatus').removeClass('Pen').addClass('Off').attr('onclick', 'chat_on();');
}
 });
}

function chat_off_temp(){
 $.ajax({
 type: "POST",
 url: "modules/chat/chat_off_browser.php",
 data: {anu:"bhav"}
 });
}

function chat_on(){
$('#chatStatus').removeClass('Off').addClass('Pen');
 $.ajax({
 type: "POST",
 url: "modules/chat/chat_on.php",
 data: {anu:"bhav"}
 }).done(function( result ) {
var res=result;
if(res=='ok'){
$('#chatStatus').removeClass('Pen').addClass('On').attr('onclick', 'chat_off();');
dockChat();
}
 });
}

function chat(did,uname){
var tu=$('#chatBox'+did).length;
if(tu<4){
if(tu==0){
var nu=$('.firstC').length;
if(nu==0){
$('#wrapper').append('<div id="chatBox'+did+'" class="chatBox firstC"><div id="chatCurtain'+did+'" class="chatCurtain"><img src="loading.gif"></div></div>');
}
if(nu==1){
var nyu=$('.secondC').length;
if(nyu==0){
$('#wrapper').append('<div id="chatBox'+did+'" class="chatBox secondC"><div id="chatCurtain'+did+'" class="chatCurtain"><img src="loading.gif"></div></div>');
}
if(nyu==1){
$('#wrapper').append('<div id="chatBox'+did+'" class="chatBox thirdC"><div id="chatCurtain'+did+'" class="chatCurtain"><img src="loading.gif"></div></div>');
}
}
$('#chatBox'+did).append('<div class="chatClose" onclick=chatClose("'+did+'")>&#10006;</div><div class="chatTitle" onclick=boxTog("'+did+'")>'+uname+'</div><div id="chatBoxMain'+did+'" class="chatBoxMain"></div>');
$.ajax({
 type: "POST",
 url: "modules/chat/chat_init.php",
 data: {oid:did}
 }).done(function( result ) {
var res=result;
if(res!='Error'){
$('#chatBoxMain'+did).append(res);
$('.cMes').emoticonize();
toBot(did);
$('#chatCurtain'+did).fadeOut(200).remove();
}
 });

}
else{
$('#chatBox'+did).removeClass('botomPo');
$('#chatBox'+did).animate({ width: '0px' }, 'fast').delay(200).animate({ width: '25%' }, 'fast');
}
}
else{
war('Maximum 3 active chats at a time!');
}
}

function boxTog(did){
$('#chatBox'+did).toggleClass('botomPo');
}

function cSend(did){
var ti=$('#cText'+did).val();
$.ajax({
 type: "POST",
 url: "modules/chat/chat_send.php",
 data: {oid:did, text:ti}
 }).done(function( result ) {
var res=result;
if(res=='1'){
$('#chatBoxMain'+did).append('<li class="cMes cMe">'+ti+'</div>');
document.getElementById('cText'+did).value="";
$('.cMes').emoticonize();
toBot(did);
}
 });
}

function chatClose(did){
$('#chatBox'+did).animate({ top: '0px' }, 'fast').delay(500).remove();
var nu=$('.secondC').length;
if(nu>0){
var ty=  $('.secondC').attr("id");
$('#'+ty).removeClass('secondC').addClass('firstC');
}

var nyu=$('.thirdC').length;
if(nyu>0){
var ty=  $('.thirdC').attr("id");
$('#'+ty).removeClass('thirdC').addClass('secondC');
}
}

function cCheck(){
$.ajax({
 type: "POST",
dataType: 'json',
 url: "modules/chat/chat_check.php",
 }).done(function(obj) {
for (var i = 0; i < obj.length; i++) {
var did=obj[i].oid;
var text=obj[i].text;
var uname=obj[i].uname;
popNot(did,text,uname);
}
 });
}

function popNot(did,text,uname){
var tu=$('#chatBox'+did).length;
if(tu==1){
$('#chatBoxMain'+did).append('<li class="cMes cDe">'+text+'</div>');
$('.cMes').emoticonize();
toBot(did);
}
else{
if(tu<4){
chat(did,uname);
}
else{
$('#c'+did).css('border-right', '20px solid #ff0');
}
}
}

function toBot(did){
$("#chatBoxMain"+did).animate({ scrollTop: $("#chatBoxMain"+did)[0].scrollHeight}, 1000);
}








</script>