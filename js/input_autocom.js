jQuery(function($) {

    $(function () {


        let url = "Hint_location.php";

        if(getCurrentLocation() === "index" || getCurrentLocation() === "")
            url = "php/" + url;

        $(".input_station").autocomplete({
            source: url
        });

        $.ui.autocomplete.filter = function (array, term) {
            let matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
            return $.grep(array, function (value) {
                return matcher.test(value.label || value.value || value);
            });
        };


    });
});