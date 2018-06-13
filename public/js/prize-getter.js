var profilePageClass = {
    setPageContent: function() {
        var response = $.ajax({
            url: 'get-prize',
            success: function(jsonResponse){
                var data = $.parseJSON(JSON.stringify(jsonResponse));
                console.log(data);
                var prizesAmountSelector;
                var prizesOwnerType = ['casino', 'user'];
                var prizesAmount = [];
                for (var i = 0; i <= 1; i++) {
                    for (var j = 1; j <= 4; j++) {
                        prizesAmountSelector = $("."+prizesOwnerType[i]+" .amount.prize"+j);//Получаем селектор количества призов текущего объекта
                        prizesAmountSelector.text(data[prizesOwnerType[i]]["prizes"]['prize'+j]['amount']);
                    }
                }
                $(".casino_jackpot").text(data["casino"]["money"]);
                $(".user_money").text(data["user"]["money"] + " Kč");
                $(".user_bonus_balls").text(data["user"]["bonus_balls"] + " bonus balls");
            },
            error: function () {
                return false;
            }
        });
    }
};

$(document).ready(function() {
	$("#get_prize").click(function () {

            var profilePageInfo = profilePageClass.setPageContent();
        }
    );
});