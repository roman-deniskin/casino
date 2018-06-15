var profilePageClass = {
    getData: function(url) {
        if (url == undefined)
            return false;
        var response = '';
        $.ajax({
            type: "POST",
            url: url,
            async: false,
            success: function(jsonResponse){
                response = $.parseJSON(JSON.stringify(jsonResponse));
            },
            error: function () {
                response = $.parseJSON(JSON.stringify(jsonResponse));
            }
        });
        console.log(response);
        return response;
    },
    changeWndStatus: function (wndClassName, status) {
        var windowInstance = $(".modal_wnd_wrapper"+wndClassName);
        $(windowInstance).attr("data-modalstate", status).data();
    },
    setPageContent: function (data) {
        var prizesAmountSelector;
        var prizesOwnerType = ['casino', 'user'];
        var prizesAmount = [];
        for (var i = 0; i <= 1; i++) {
            for (var j = 1; j <= 4; j++) {
                prizesAmountSelector = $("."+prizesOwnerType[i]+" .amount.prize"+j);//Получаем селектор количества призов текущего объекта
                prizesAmountSelector.text(data[prizesOwnerType[i]]["prizes"]['prize'+j]['amount']);
            }
        }
        $("span.unconfirmed_money").text(data["user"]["unconfirmed_money"]);
        $(".casino_jackpot").text(data["casino"]["money"]);
        $(".user_money").text(data["user"]["money"] + " Kč");
        $(".user_bonus_balls").text(data["user"]["bonus_balls"] + " bonus points");
    }
};

$(document).ready(function() {
    $("#get_prize").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.changeWndStatus(".unconfirmed_money", 'open');
        }
    );
    $("#sendMoneyToBank").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize/get-money');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.changeWndStatus(".unconfirmed_money", 'hidden');
        }
    );
    $("#get_bonuses").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize/get-bonus');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.changeWndStatus(".unconfirmed_money", 'hidden');
        }
    );
});