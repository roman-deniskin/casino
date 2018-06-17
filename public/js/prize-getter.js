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
        var prizesImg = [];
        for (var i = 0; i <= 1; i++) {
            for (var j = 1; j <= 4; j++) {
                prizesAmountSelector = $("."+prizesOwnerType[i]+" .amount.prize"+j);//Получаем селектор количества призов текущего объекта
                prizesAmountSelector.text(data[prizesOwnerType[i]]["prizes"]['prize'+j]['amount']);
                prizesImg[j] = data[prizesOwnerType[i]]["prizes"]['prize'+j]['img'];
            }
        }
        $("span.unconfirmed_money").text(data["user"]["unconfirmed_money"]);
        $(".casino_jackpot").text(data["casino"]["money"] + " Kč");
        $(".user_money").text(data["user"]["money"] + " Kč");
        $(".user_bonus_balls").text(data["user"]["bonus_balls"] + " bonus points");
        $(".modal_wnd_img img").attr('src', prizesImg[data["user"]["unconfirmed_prize"]["type"]]);
    },
    wndResolver: function (profilePageInfo) {
        if (profilePageInfo == undefined) {
            console.log("function wndResolver: argument is undefined");
            return 0;
        }
        if (profilePageInfo.user.unconfirmed_money > 0)
            profilePageClass.changeWndStatus(".unconfirmed_money", 'open');
        else
            profilePageClass.changeWndStatus(".unconfirmed_money", 'hidden');
        if (profilePageInfo.user.unconfirmed_prize.is_confirmed != undefined)
            profilePageClass.changeWndStatus(".unconfirmed_prize", 'open');
        else
            profilePageClass.changeWndStatus(".unconfirmed_prize", 'hidden');
    }
};

$(document).ready(function() {
    var profilePageInfo = profilePageClass.getData('get-prize/get-info');
    profilePageClass.setPageContent(profilePageInfo);
    profilePageClass.wndResolver(profilePageInfo);
    $("#get_prize").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize');
            console.log(profilePageInfo);
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.wndResolver(profilePageInfo);
        }
    );
    $("#sendMoneyToBank").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize/get-money');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.wndResolver();
        }
    );
    $("#get_bonuses").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize/get-bonus');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.wndResolver();
        }
    );
    $("#send_prize").click(function () {
            var profilePageInfo = profilePageClass.getData('get-prize/send-prize');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.wndResolver();
        }
    );
    $("#reject_prize").click(function () {
            var profilePageInfo = profilePageClass.getData('/get-prize/change-prize');
            profilePageClass.setPageContent(profilePageInfo);
            profilePageClass.wndResolver();
        }
    );
});