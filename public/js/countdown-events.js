var App = {
    user_info: [],
    nameRegex: /^[0-9a-zA-Z_-]+$/,
    lc: null,
    item_slot: -1,
    first: true,
    page: false,
    clicks: 0,
    login: 0,
    isfirst: false,
    events_time: [],
    getEventTimes: function () {
        App.events_time = xWebConfig.timers;
        if (App.isfirst == false) {
            App.events();
            App.isfirst = true;
        }
    },
    events: function () {
        i = 0;
        for (i in App.events_time) {
            newDiv = $("<div class=\"flex-s\"/>");
            newDiv.append($("<div class=\"list-name\"/>").text(App.events_time[i].name));
            newDiv.append($("<span class=\"list-time\" />").attr({id: 'event' + App.events_time[i].id}).text(App.formatedTime(App.events_time[i].left)));
            $("#events").append(newDiv);
            i++;
        }
        setInterval(function () {
            App.updateEventTimes()
        }, 1000);
    },
    updateEventTimes: function () {
        for (i in App.events_time) {
            App.events_time[i].left--;
            if (App.events_time[i].left < 0) {
                App.events_time[i].left++;
                App.getEventTimes();
            }
            $("#event" + App.events_time[i].id).text(App.formatedTime(App.events_time[i].left));
        }
    },
    sprintf: function (format) {
        for (var i = 1; i < arguments.length; i++) {
            format = format.replace(/%s|%d/, arguments[i]);
        }
        return format;
    },
    setCookie: function (key, value, days) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + encodeURIComponent(String(value)) + ';expires=' + expires.toUTCString();
    },
    readCookie: function (key) {
        var result;
        return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? (result[1]) : null;
    },
    count_down: function (target) {
        var serverDate = App.serverDate();
        var targetDate = new Date(target);
        setInterval(function () {
            serverDate.setSeconds(serverDate.getSeconds() + 1);
            App.updateTime(serverDate, targetDate)
        }, 1000);
    },
    checkTime: function (i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    },
    timeDifference: function (begin, end) {
        if (end < begin) {
            return false;
        }
        var diff = {
            seconds: [end.getSeconds() - begin.getSeconds(), 60],
            minutes: [end.getMinutes() - begin.getMinutes(), 60],
            hours: [end.getHours() - begin.getHours(), 24],
            days: [end.getDate() - begin.getDate(), new Date(begin.getYear(), begin.getMonth() + 1, 0).getDate()],
        };
        var result = new Array();
        var flag = false;
        for (i in diff) {
            if (flag) {
                diff[i][0]--;
                flag = false;
            }
            if (diff[i][0] < 0) {
                flag = true;
                diff[i][0] += diff[i][1];
            }
            if (i == 'days' && !diff[i][0]) continue;
            result.push(App.checkTime(diff[i][0]));
        }
        return result.reverse().join(':');
    },
    updateTime: function (serverDate, targetDate) {
        var s = App.timeDifference(serverDate, targetDate);
        if (s.length) {
            var days, hours, minutes, seconds;
            var seconds_left = (targetDate.getTime() - serverDate.getTime()) / 1000;
            days = parseInt(seconds_left / 86400);
            seconds_left = seconds_left % 86400;
            hours = parseInt(seconds_left / 3600);
            seconds_left = seconds_left % 3600;
            minutes = parseInt(seconds_left / 60);
            seconds = parseInt(seconds_left % 60);
            $('#days').html(days);
            $('#hours').html(hours);
            $('#minutes').html(minutes);
            $('#seconds').html(seconds);
        }
        else {
            $('#timer_div_title').hide();
            $('#timer_div_time').hide();
            clearInterval(App.updateTime(serverDate, targetDate));
        }
    },
    serverDate: function () {
        var time;
        $.ajax({
            type: "GET",
            url: DmNConfig.base_url + "ajax/get-time",
            dataType: 'jsonp',
            async: false,
            success: function (data) {
                time = new Date(data.ServerTime);
            }
        });
        return time;
    },
    formatedTime: function (seconds) {
        second = seconds % 60;
        minutes = parseInt((seconds / 60) % 60);
        hour = parseInt((seconds / 3600) % 24);
        days = parseInt(seconds / (24 * 3600));
        html = '';
        if (days > 0)
            html += days + 'd ';
        if (hour > 0)
            html += hour + 'h ';
        if (days > 0 && hour <= 0)
            html += '0h ';
        if (minutes > 0)
            html += minutes + 'm ';
        if (minutes < 0)
            html += '0m ';
        if (second < 10)
            second = '0' + second;
        html += second + 's';
        return html;
    }
};


