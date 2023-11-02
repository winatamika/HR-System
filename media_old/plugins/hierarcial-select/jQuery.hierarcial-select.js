(function($) {

	$.fn.selectHierarchy = function(options) {
			options = options || {};
			var defaults = {
				indentPx: 25
			};
			options = $.extend({}, defaults, options);
			
			var select = $(this);
			
			select.find("option[data-isparent='true']").css('font-weight', 'normal');
			
			select.children().filter(function() {
				return $(this).data("level") != 1;
			}).css("padding-left", function() {
				var opt = $(this);
				var level = parseInt(opt.data("level"));
				return ((level - 1) * options.indentPx) + "px";
			});
		};
})(jQuery);