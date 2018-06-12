var prizeGetter = {
    getPageContent: function() {
        alert('PageRefrashed');
    }
};

$(document).ready(function() {
	$("#get_prize").onclick(function () {
            prizeGetter.getPageContent();
        }
    );
});