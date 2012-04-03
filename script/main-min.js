/**
 * Console Debugging
 * To use console.log you will need to set the varible `debugging` to `true`
 * before this script is called.
 */if(typeof console=="undefined"||typeof jsDebugging=="undefined")var console={log:function(){}};else if(!jsDebugging||typeof console.log=="undefined")console.log=function(){};var isset=function(a){return $(a).length>=1?!0:!1};$(document).ready(function(){$("html").removeClass("no-js")});