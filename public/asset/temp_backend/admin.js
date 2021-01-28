$(function () {
	$(".gen_slug").keyup(function () {
		var $Text = $(this).val();
		var $id = $(this).attr('lang');
		$(".slug_spot[lang="+$id+"]").val(convertToSlug($Text));
	})

	$("a[rel=delete]").click(function () {
	    var $conf   = confirm("Are you sure you want to delete this record?");
	    if ($conf == true) return true;
	    else return false;
	})

})

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
