$('document').ready(function(){
$('#contenta').niceScroll();
$('#postDoPhoto').toggle();
ux('about');
$('#notifs').niceScroll();
$('#friendsnotif').niceScroll();
mainMenu();
bgPreview();
});
window.setInterval(function(){checkNotifs()}, 5000);
window.setInterval(function(){checkFriends()}, 7500);
$(window).load(function(){ msL(); $('#wrapLoad').fadeOut(500);$('#wChatCss').load('themes/chats3.css'); $('#wChatJs').load('js/chats3.js');});

function war(te){
$('html body').append('<div id="nottu" onclick="endWar()"></div>');
$('#nottu').fadeIn(200).append(te);
hts();
}

function hts(){
window.setTimeout(function(){endWar()}, 5000);
}

function endWar(){
$('#nottu').fadeOut(300);
$('#nottu').delay(500).empty().remove();
}

function msL(){
$('#midSimg').attr('src','img/log.png');
}
function msO(){
$('#midSimg').attr('src','loading.gif');
}
function lsub(){

var value = $('#username').val();
var valup=value.trim();

if(valup.length < 1){
$('#username').css('border', '1px solid #f00');
}

var pvalue = $('#password').val();
var pvalup=pvalue.trim();
if(pvalup.length < 1){
$('#password').css('border', '1px solid #f00');
}
if((pvalup.length > 0) && (valup.length > 0 )){
$('#password').css('border', '1px solid #0f0');
$('#username').css('border', '1px solid #0f0');
var user = $("#username").val();
var pass = $("#password").val();
 $.ajax({
 type: "POST",
 url: "login.php",
 data: {username: user, password: pass}
 }).done(function( result ) {
var res=result;
if(res=='dashboard'){
window.location.replace(res);
}
else{
war(res);
}
$('#username').css('border', '1px solid #cdcdcd');
$('#password').css('border', '1px solid #cdcdcd');
 });
}
}



function jsub(){
if(!($('#terms').is(':checked'))){
war('Agree with the terms!');
}

var value = $('#susername').val();
var valup=value.trim();

if(valup.length < 1){
$('#susername').css('border', '1px solid #f00');
}

var value = $('#spassword').val();
var pvalup=value.trim();
if(pvalup.length < 1){
$('#spassword').css('border', '1px solid #f00');
}

var value = $('#srepassword').val();
var qvalup=value.trim();
if(qvalup.length < 1){
$('#srepassword').css('border', '1px solid #f00');
}

if(!(pvalup==qvalup)){
$('#srepassword').css('border', '1px solid #f00');
war("Passwords don't match!");
}

var value = $('#semail').val();
var rvalup=value.trim();
if(rvalup.length < 1){
$('#semail').css('border', '1px solid #f00');
}


if((pvalup==qvalup) && (pvalup.length > 0) && (valup.length > 0 ) && (qvalup.length > 0) && (rvalup.length > 0 )){
$('#susername').css('border', '1px solid #0f0');
$('#spassword').css('border', '1px solid #0f0');
$('#srepassword').css('border', '1px solid #0f0');
$('#semail').css('border', '1px solid #0f0');

var username = $("#susername").val();
var password = $("#spassword").val();
var email = $("#semail").val();
 $.ajax({
 type: "POST",
 url: "joinin.php",
 data: {pass: password, email: email, uname: username}
 }).done(function( result ) {
var res=result;
war(res);
if(res=='ok'){
window.location.replace('signup');
}
 });

}

}


function fadecon(){
$('#curtain1').toggle(800);
$('#content1').slideToggle(801);
}

function secret(){
$('#v7').fadeToggle(1000);
var tei=document.getElementById('v6').style.width;
if(tei=='46.5%'){
$('#v6').css('width','70.75%');
$('#content6').css('width','70.75%');
}
else{
$('#v6').css('width','46.5%');
$('#content6').css('width','46.5%');
}
}


function home(port){

if(port=='home'){
clearhome();

window.history.pushState('iunv.in',"iunv", "#home");
document.title ="Welcome to iunv!";

$("#v2 .social").slideDown();
$("#content2").fadeIn();

$("#v3 .find").slideDown();
$("#content3").fadeIn();

$("#v4 .play").slideDown();
$("#content4").fadeIn();
$("#v6 .oth").slideDown();
$("#content6").fadeIn();
$('#nhome').removeClass('home-nav-inactive');
$('#nhome').addClass('home-nav-active');
}

else{
clearhome();
window.history.pushState('iunv.in',"iunv", "#"+port);
document.title ="An introduction to iunv."+port+"!";
$('#v2 .'+port).slideDown();
$('#v3 .'+port).slideDown();
$('#v4 .'+port).slideDown();
$('#v6 .'+port).slideDown();
$('#n'+port).removeClass('home-nav-inactive').addClass('home-nav-active');
}
}

function clearhome(){

$('#nhome').removeClass('home-nav-active');
$('#nhome').addClass('home-nav-inactive');
$("#v2 .social").slideUp();
$("#v2 .find").slideUp();
$("#v2 .play").slideUp();
$("#v2 .oth").slideUp();
$("#v2 .more").slideUp();
$("#content2").delay(500).fadeOut();
$('#nsocial').removeClass('home-nav-active');
$('#nsocial').addClass('home-nav-inactive');

$("#v3 .social").slideUp();
$("#v3 .find").slideUp();
$("#v3 .play").slideUp();
$("#v3 .oth").slideUp();
$("#v3 .more").slideUp();
$("#content3").delay(300).fadeOut();
$('#nfind').removeClass('home-nav-active');
$('#nfind').addClass('home-nav-inactive');
$("#v4 .social").slideUp();
$("#v4 .play").slideUp();
$("#v4 .find").slideUp();
$("#v4 .oth").slideUp();
$("#v4 .more").slideUp();
$("#content4").delay(400).fadeOut();
$('#nplay').removeClass('home-nav-active');
$('#nplay').addClass('home-nav-inactive');
$("#v6 .social").slideUp();
$("#v6 .oth").slideUp();
$("#v6 .play").slideUp();
$("#v6 .find").slideUp();
$("#v6 .more").slideUp();
$("#content6").delay(600).fadeOut();
}

function homeNext(){
var now=window.location.hash;
if(now=='#social'){
home('play');
}
else if(now=='#play'){
home('find');
}
else if(now=='#find'){
home('home');
}
else if(now=='#home'){
home('social');
}
else{
home('home');
}
}

function homePrev(){
var now=window.location.hash;
if(now=='#social'){
home('home');
}
else if(now=='#play'){
home('social');
}
else if(now=='#find'){
home('play');
}
else if(now=='#home'){
home('find');
}
else{
home('home');
}
}

function totag(){
var now=window.location.hash;
if(now=='#social'){
home('social');
}
else if(now=='#play'){
home('play');
}
else if(now=='#find'){
home('find');
}
else if(now=='#oth'){
home('oth');
}
else if(now=='#more'){
fadecon();
kmore();
}
else if(now=='#home'){
home('home');
}
else if(now=='#about'){
port('about');
}
else if(now=='#profileMissing'){
port('profileMissing');
}
else if(now=='#storyMissing'){
port('storyMissing');
}
else if(now=='#contact'){
port('contact');
}
else if(now=='#faq'){
port('faq');
}
else if(now=='#terms'){
port('terms');
}
else if(now=='#privacy'){
port('privacy');
}
else{
home('home');
}
}

function kmore(){
clearhome();
window.history.pushState('iunv.in',"iunv", "#more");
document.title ="A little more about iunv!";
$('#v2 .more').slideDown();
$('#v3 .more').slideDown();
$('#v4 .more').slideDown();
$('#v6 .more').slideDown();
}

function port(loc){

var tis=$('#'+loc+' #appContent #buk').length;

if(tis==0){
$('#'+loc+' #appContent').load('pages/'+loc+'.php');
}

window.history.pushState('iunv.in',"iunv", "#"+loc);

if(loc=='about'){
var titl='About Us';
}
else if(loc=='contact'){
var titl='Contact Us';
}
else if(loc=='tnc'){
var titl='Terms and Conditions';
}
else if(loc=='privacy'){
var titl='Privacy Policy';
}
else if(loc=='faq'){
var titl='Frequently Asked Questions';
}
else if(loc=='profileMissing'){
var titl='Profile Missing';
}
else if(loc=='storyMissing'){
var titl='Story Missing';
}
else{
var title='Knowing more';
}
document.title = titl+' - iunv';

$('#port1').animate({
    left: '-100%',
  }, 400, function() {
    $('#'+loc).delay(100).fadeToggle();
  });
}

function unport(){
var now=window.location.hash;
$('#portact').remove();
$(now).slideToggle(400);
$('#port1').delay(500).animate({
    left: '0%',
  }, 400, function() {
  });
home('home');
}


function bUserMenu(){
$('#bUserMenu').fadeToggle(300);
}

function mainMenu(){
var stat= document.getElementById('bMenuRoot').className;
if(stat=='menuinactive'){
$('#bMenuRoot').removeClass('menuinactive');
$('#bMenuRoot').addClass('menuactive');
$('#contenta').animate({left: '13%'}, 400);
$('#proSets').animate({left: '13%'}, 400);
$('#mainMenu').delay(200).fadeIn(500);
}
else{
$('#bMenuRoot').removeClass('menuactive');
$('#bMenuRoot').addClass('menuinactive');
$('#mainMenu').fadeOut(400);
$('#contenta').delay(200).animate({left: '6.75%'}, 500);
$('#proSets').delay(200).animate({left: '6.75%'}, 500);
}
}

function getGlobal(){
msO();
$.ajax({
 type: "POST",
 url: "globalfeed.php",
 data: {anu:'bhav'}
 }).done(function( result ) {
var stat=result;
if(stat!='ok'){
msL();
$('#streamMain').empty();
$('#streamMain').append(stat);
$("#contenta").getNiceScroll().resize();
}
});
}

function getLocal(dname){
msO();
$.ajax({
 type: "POST",
 url: "userfeed.php",
 data: {tyn: dname}
 }).done(function( result ) {
var stat=result;
if(stat!='ok'){
msL();
$('#streamMain').empty();
$('#streamMain').append(stat);
$("#contenta").getNiceScroll().resize();
}
});
}

function postPhoto(){
$('#postPhoto').toggleClass('typeactive');
$('#postPhoto').toggleClass('typeinactive');
$('#photoSelect').slideToggle();
$('#postText').toggle();
$('#photoCap').toggle();
$('#postDoText').toggle();
$('#postDoPhoto').toggle();
}

function postItText(){
msO();
$('#postPhoto').slideUp(500);
$('#postText').slideUp(500);
$('.postDo').empty();
$('.postDo').append('<img src="loading.gif" title="Posting..." height="24px">');
var tvalue = $('#postText').val();
var tvalup=tvalue.trim();
if(tvalup.length < 1){
$('#postText').css('border', '1px solid #f00');
}
if(tvalup.length > 0){
$('#postText').css('border', '1px solid #0f0');
 $.ajax({
 type: "POST",
 url: "modules/post/post.php",
 data: {postedText: tvalue}
 }).done(function( result ) {
var stat=result;
if(stat=='ok'){
msL();
var tuy=$('.streamsli').length;
$('#contenta #streamTop').append('<li class="streamsli nwestr" id="ajj'+tuy+'"> You said: '+tvalue+'</li>');
$('#postText').css('border', '1px solid #cdcdcd');
document.getElementById('postText').value="";
$('#ajj'+tuy).slideToggle();
$("#ajj"+tuy).css("display", "block");
}
 });
}
$('#postPhoto').slideDown(500);
$('#postText').slideDown(500);
$('.postDo').empty();
$('.postDo').append('<img src="img/post2.png" title="Post It!" height="24px">');
}

function postItPhoto(){
msO();
$('#postPhoto').slideUp(500);
$('#photoSelect').slideUp(500);
$('#photoCap').slideUp(500);
$('.postDo').empty();
$('.postDo').append('<img src="loading.gif" title="Posting..." height="24px">');
var tvalue=$('#photoCap').val();
var tvalup=$('#picDid').length;
if(tvalup > 0){
$('#photoCap').css('border', '1px solid #0f0');
 $.ajax({
 type: "POST",
 url: "modules/post/postPhoto.php",
 data: {cap: tvalue}
 }).done(function( result ) {
var stat=result;
if(stat=='ok'){
msL();
document.getElementById('postText').value="";
}
 });
}
else{
$('#photoCap').css('border', '1px solid #f00');
war('Please select a photo!');
}
$('#photoCap').css('border', '1px solid #cdcdcd');
document.getElementById('photoCap').value="";
$('#postPhoto').slideDown(500);
$('#photoCap').slideDown(500);
$('#photoSelect').slideDown(500);
$('#photos').empty();
$('.postDo').empty();
$('.postDo').append('<img src="img/post2.png" title="Post It!" height="24px">');
$('#postPhoto').toggleClass('typeactive');
$('#postPhoto').toggleClass('typeinactive');
}

function skipsignup1(){
$('#jf1').slideUp(500);
$('#jf2').slideDown(500);
}

function skipsignup2(){
$('#jf2').slideUp(500);
$('#jf3').slideDown(500);
}

function skipsignup3(){
window.location.replace('dashboard');
}

function prevsignup2(){
$('#jf3').slideUp(500);
$('#jf2').slideDown(500);
}
function prevsignup1(){
$('#jf1').slideDown(500);
$('#jf2').slideUp(500);
}

function signup1(){
msO();
var fullname=$('#fullname').val();
var dob=$('#userdob').val();
var bio=$('#userbio').val();
var spec=$('#userspecial').val();
$.ajax({
 type: "POST",
 url: "modules/signup/signup-1.php",
 data: {fullname: fullname, dob: dob, bio: bio, spec: spec}
 });
setTimeout(function(){skipsignup1()},1000);
msL();
}

function dothis(){
msO();
var country=$('#country').val();
var state=$('#province').val();
var region=$('#region').val();
var city=$('#city').val();
var phone=$('#phone').val();
$.ajax({
 type: "POST",
 url: "modules/signup/signup-1.php",
 data: {country: country, state: state, region: region, city: city, phone: phone}
 });
setTimeout(function(){skipsignup2()},1000);
msL();
}

function justdothis(){
msO();
var job=$('#proffession').val();
var expertise=$('#expertise').val();
var school=$('#school').val();
var college=$('#college').val();
var university=$('#university').val();
var language=$('#language').val();
var martial=$('#martial').val();
$.ajax({
 type: "POST",
 url: "modules/signup/signup-1.php",
 data: {job: job, expertise: expertise, school: school, college: college, university: university, language: language, martial: martial}
 }).done(function( result ) {
var stat=result;
if(stat=='ok'){
msL();
setTimeout(function(){skipsignup3()},5000);
}
 });

}

function like(sid){
msO();
$.ajax({
 type: "POST",
 url: "modules/like/like.php",
 data: {sid:sid}
 }).done(function( result ) {
var stat=result;
if(stat=='add'){
msL();
var likes= document.getElementById('dlikes'+sid).innerHTML;
var nl=likes-1;
var njl=nl+2;
$('#dlikes'+sid).empty();
$('#dlikes'+sid).append(njl);
}
else{
msL();
var likes= document.getElementById('dlikes'+sid).innerHTML;
var nl=likes-1;
$('#dlikes'+sid).empty();
$('#dlikes'+sid).append(nl);
}
 });

}

function comment(sid){
msO();
$('#cnd'+sid).fadeIn();
$.ajax({
 type: "POST",
 url: "modules/comment/comments.php",
 data: {sid:sid}
 }).done(function( result ) {
var stat=result;
if(!(stat=='none')){
msL();
$('#comments'+sid).empty();
$('#comments'+sid).append(stat);
$("#storyExt").getNiceScroll().resize();
}
});

}

function doComment(sid){
msO();
var text=$('#cd'+sid).val();
$.ajax({
 type: "POST",
 url: "modules/comment/comment.php",
 data: {sid:sid, text: text}
 }).done(function( result ) {
var stat=result;
if(stat=='ok'){
msL();
document.getElementById('cd'+sid).value="";
comment(sid);
}
});

}

function ux(tolo, kholo){
msO();
clearux();
$('#ux'+tolo).addClass('uMenOin');
$('#uxo'+tolo).delay(200).fadeIn(150);
var sta=$('#buks'+tolo).length;
if((sta==0) && (tolo!='about')){
$.ajax({
 type: "POST",
 url: "modules/profile/p"+tolo+".php",
 data: {quax: kholo}
 }).done(function( result ) {
var stat=result;
if(stat!='ok'){
msL();
$('#uxo'+tolo).empty().append(stat);
$('#uxoabout').niceScroll();
$('#uxophotos').niceScroll();
$('#uxofriends').niceScroll();

}
});
}

}

function clearux(){
$('#uxabout').removeClass('uMenOin');
$('#uxphotos').removeClass('uMenOin');
$('#uxfriends').removeClass('uMenOin');
$('#uxoabout').fadeOut(150);
$('#uxophotos').fadeOut(150);
$('#uxofriends').fadeOut(150);
}

function friends(uid){
msO();
$.ajax({
 type: "POST",
 url: "modules/profile/friends.php",
 data: {uid:uid,}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
$('.uxfr'+uid).empty();
$('.uxfr'+uid).append(stat);
}
});

}

function photoview(urlo){
$('#vMain').empty();
$('#vMain').append('<img class="bigImg" src="'+urlo+'">');
$('#viewer').delay(200).fadeIn(200);
}

function killphotoview(){
$('#viewer').fadeOut(400);
}

function navto(page){
window.history.pushState('iunv.in',"iunv", page);
var title=titleCase(page);
document.title =title;
$('#wrapper').empty();
$('#wrapLoad').fadeIn(500);
}

function titleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function getFriends(uid){
msO();
$.ajax({
 type: "POST",
 url: "modules/profile/pfriends.php",
 data: {quax: uid}
 }).done(function( result ) {
var stat=result;
if(stat!='ok'){
msL();
$('#contentaMain').empty();
$('#contentaMain').append(stat);
$('#contenta').niceScroll();

}
});
}

function getPhotos(uid){
msO();
$.ajax({
 type: "POST",
 url: "modules/photos/pphotos.php",
 data: {quax: uid}
 }).done(function( result ) {
var stat=result;
if(stat!='ok'){
msL();
$('#contentaMain').empty();
$('#contentaMain').append(stat);
$("#contenta").getNiceScroll().resize();

}
});
}

function photoinfo(sid){
msO();
$.ajax({
 type: "POST",
 url: "modules/photos/pinfo.php",
 data: {sid:sid,}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
$('#storyExt').animate({right: '-45%'}, 100);
$('#storyExt').delay(80).fadeOut(10);
setTimeout(function(){
$('#storyExt').css('height', 'auto').addClass('storyExtPhotos').empty().append(stat);
},251);
$('#storyExt').delay(50).fadeIn(10);
$('#storyExt').delay(150).animate({right: '0.5%'}, 100);
}
});

}

function notifs(){
msO();
$('#friendsnotif').fadeOut(100);
$('#notifs').fadeToggle(100);
msL();
}
function friendsno(){
msO();
$('#notifs').fadeOut(100);
$('#friendsnotif').fadeToggle(100);
msL();
}

function checkNotifs(){
msO();
$.ajax({
 type: "post",
 url: "modules/notifications/mini_ajax.php",
 data: {anu: 'bhav'}
 }).done(function( result ) {
var stat=result;
msL();
if(stat!='0'){
var oi=$('#bNotif').val();
var nok=oi-2+1+1+1;
$('#bNotif').empty().append(nok);
$('#notifsTop').append(stat);
}
});

}

function checkFriends(){
msO();
$.ajax({
 type: "post",
 url: "http://localhost/new/modules/friends/mini_ajax.php",
 data: {anu: 'bhav'}
 }).done(function( result ) {
var stat=result;
msL();
if(stat!='0'){
$('#friendsTop').append(stat);
var oi=$('#bFriends').val();
var nok=oi-2+1+1+1;
$('#bFriends').empty().append(nok);
}
});

}

function saveSettings(){
msO();
var thm=$('#theme').val();
$('#stSave').empty().append('Saving...');
$.ajax({
 type: "post",
 url: "modules/settings/savesettings.php",
 data: {thm: thm}
 }).done(function( result ) {
var stat=result;
if(stat=='ok'){
msL();
$('#stSave').empty().append('Refreshing...');
setTimeout(function(){window.location.reload(true);},1000);

}
});

}

function getCookie(c_name)
{
var c_value = document.cookie;
var c_start = c_value.indexOf(" " + c_name + "=");
if (c_start == -1)
{
c_start = c_value.indexOf(c_name + "=");
}
if (c_start == -1)
{
c_value = null;
}
else
{
c_start = c_value.indexOf("=", c_start) + 1;
var c_end = c_value.indexOf(";", c_start);
if (c_end == -1)
{
c_end = c_value.length;
}
c_value = unescape(c_value.substring(c_start,c_end));
}
return c_value;
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function bgPreview(){
msO();
var uid=getCookie("iunv_id");
var bg=getCookie("iunv_bg");
$('#dPreview').empty();
if(bg=='default'){
$('#dPreview').append('<img src="uploads/backgrounds/default.jpg">');
}
else{
$('#dPreview').append('<img src="uploads/backgrounds/'+uid+'/thumbnails/'+bg+'">');
}
$("#contenta").getNiceScroll().resize();
msL();
}

function thm(thi){
msO();
setCookie('iunv_th', thi+'.css', 365);
if(thi=='iunv'){
$('.appTop').css('background', 'rgba(18, 119, 255, 0.8)');
$('#bUser').css('background', '#1299ff');
$('#mainMenu').css('background', 'rgba(5, 204, 253, 0.3)');
$('.mainli').css('background', 'rgba(16, 175, 250, 0.6)');
}
else if(thi=='red'){
$('.appTop').css('background', 'rgba(255, 75, 18, 0.8)');
$('#bUser').css('background', 'red');
$('#mainMenu').css('background', 'rgba(253, 5, 5, 0.3)');
$('.mainli').css('background', 'rgba(250, 16, 16, 0.6)');
}
else if(thi=='black'){
$('.appTop').css('background', 'rgba(134, 134, 134, 0.9)');
$('#bUser').css('background', '#505050');
$('#mainMenu').css('background', 'rgba(255, 255, 255, 0.3)');
$('.mainli').css('background', 'rgba(0, 0, 0, 0.6)');
}
else if(thi=='green'){
$('.appTop').css('background', 'rgba(40, 224, 47, 0.9)');
$('#bUser').css('background', '#64FF0D');
$('#mainMenu').css('background', 'rgba(0, 255, 31, 0.3)');
$('.mainli').css('background', 'rgba(66, 207, 0, 0.6)');
}
msL();
}

function privacy(req){
msO();
$.ajax({
 type: "post",
 url: "modules/settings/quickSave.php",
 data: {req: req}
 }).done(function( result ) {
var stat=result;
if(stat=='ok'){
war('Success!');
msL();
$('#yn'+req).toggleClass('On');
$('#yn'+req).toggleClass('Off');

}
});
}

function filter(){
$('#fsBut').attr('onclick', 'dofilter()');
$('#fSBar').delay(500).fadeIn(300);
$('#fInf').delay(250).fadeOut(250);
}

function frSug(){
$('#fRes').load('modules/friends/findFriends.php');
$("#storyExt").getNiceScroll().resize();
}

function dofilter(){
msO();
$('#fRes').empty().append('<center><img src="loading.gif" align="center"></center>');
var fil=$('#fSBar').val();
$.ajax({
 type: "post",
 url: "modules/friends/find_ajax.php",
 data: {term: fil}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
$('#fRes').empty().append(stat);
}
});
}

function moreFeed(pt){
msO();
$('#moreFeed').attr('onmouseover', ' ').empty().append('<center><img src="loading.gif"></center>');
$.ajax({
 type: "POST",
 url: "globalFeed.php",
 data: {jetr: pt}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
$('#moreFeed').fadeOut(250).delay(300).remove();
$('#streamMain').append(stat);
}
});
}

function moreUserFeed(ret,pt){
msO();
$('#moreFeed').attr('onmouseover', ' ').empty().append('<center><img src="loading.gif"></center>');
$.ajax({
 type: "POST",
 url: "userfeed.php",
 data: {tyn:ret, uyt:pt}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
$('#moreFeed').fadeOut(250).delay(300).remove();
$('#streamMain').append(stat);
}
});
}

function leEdit(){
var gn=$('#dgFrame').length;
if(gn==0){
$('#proSets').append('<iframe id="dgFrame" src="modules/profile/profSet.php"></iframe>');
$('#proSets').niceScroll();
$('#proSets').getNiceScroll().resize();
}
$('#uxoabout').getNiceScroll().resize();
$('#contenta').slideUp(500);
mainMenu();
$('#proSets').slideDown(501);
$('#proeditopt').fadeOut(250).empty().append('Save').attr('onclick', 'prosave()').fadeIn(250).addClass('prosave');
$(".proedit").attr('contentEditable',true).addClass('textInput');
}

function prosave(){
msO();
$('#proSets').slideUp(500);
$('#contenta').slideDown(501);
mainMenu();
$('#proeditopt').fadeOut(250).empty().append('Edit Profile').attr('onclick', 'leEdit()').fadeIn(250).removeClass('prosave');
$(".proedit").attr('contentEditable',false).removeClass('textInput');
var bio=$('#bioBio').html();
var spec=$('#bioSpecial').html();
var lang=$('#bioLang').html();
var exp=$('#bioExp').html();
var skul=$('#bioSkul').html();
var colg=$('#bioCol').html();
var univ=$('#bioUni').html();
$.ajax({
 type: "POST",
 url: "modules/profile/profsave.php",
 data: {bio: bio, spec: spec, lang: lang, exp: exp, skul: skul, colg: colg, univ: univ}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
war(stat);
}
});
}

function seeMore(ghj){
$('#sm'+ghj).remove();
$('#smt'+ghj).css('display', 'inline');
}

function changePass(){
$('#vMain').empty();
$('#vMain').load('modules/settings/pass.php');
$('#viewer').delay(200).fadeIn(200);
}

function newPass(){
var op=$('#olPass').val();
var np=$('#newPass').val();
$.ajax({
 type: "POST",
 url: "modules/settings/nPass.php",
 data: {opas: op, pas: np}
 }).done(function( result ) {
var stat=result;
killphotoview();
war(stat);
});
}

function story(yid){
msO();
$.ajax({
 type: "POST",
 url: "modules/story/storyAct.php",
 data: {sid: yid}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
war(stat);
}
});
}