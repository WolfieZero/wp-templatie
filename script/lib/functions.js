/**
 * Console Debugging
 * To use console.log you will need to set the varible `debugging` to `true`
 * before this script is called.
 */
if (typeof console == "undefined" || typeof jsDebugging == "undefined")
	var console = { log: function() {} };
else if (!jsDebugging || typeof console.log == "undefined")
	console.log = function() {};

/**
 * Is Set
 * Checks element exists on a page
 * It grabs the length of an element and if it's equal-to or more-than 1 then
 * we take it the element has been set and return true.
 *
 * Example:
 *		if (isset('body')) {}
 *
 * @param	element
 * @return	bool
 */
var isset = function (elem) {
	if ($(elem).length >= 1) {
		return true;
	} else {
		return false;
	}
}