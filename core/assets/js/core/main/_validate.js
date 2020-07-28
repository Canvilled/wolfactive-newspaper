var Email = {
    send: function(a) {
        return new Promise(function(n, e) {
            a.nocache = Math.floor(1e6 * Math.random() + 1), a.Action = "Send";
            var t = JSON.stringify(a);
            Email.ajaxPost("https://smtpjs.com/v3/smtpjs.aspx?", t, function(e) { n(e) })
        })
    },
    ajaxPost: function(e, n, t) {
        var a = Email.createCORSRequest("POST", e);
        a.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), a.onload = function() {
            var e = a.responseText;
            null != t && t(e)
        }, a.send(n)
    },
    ajax: function(e, n) {
        var t = Email.createCORSRequest("GET", e);
        t.onload = function() {
            var e = t.responseText;
            null != n && n(e)
        }, t.send()
    },
    createCORSRequest: function(e, n) { var t = new XMLHttpRequest; return "withCredentials" in t ? t.open(e, n, !0) : "undefined" != typeof XDomainRequest ? (t = new XDomainRequest).open(e, n) : t = null, t }
};

/*Var*/
var valueName = document.querySelector('#HovaTen');
var valueNameVal = document.querySelector('#HovaTenVal');
var valueEmail = document.querySelector('#Email');
var valueEmailVal = document.querySelector('#EmailVal');
var valueNoiDung = document.querySelector('#Noidung');
var valueNoiDungVal = document.querySelector('#NoidungVal');
var formLienHe = document.querySelector('#Noidung');
var contactSubmit = document.querySelector('#frnFormBtn');
var isValidate = false;
var isName = false;
var isEmail = false;
var isComment = false;

/*Function*/
valueName ? valueName.onfocus = function() {
    valueNameVal.style.opacity = "0";
} : {};
valueEmail ? valueEmail.onfocus = function() {
    valueEmailVal.style.opacity = "0";
} : {};
valueNoiDung ? valueNoiDung.onfocus = function() {
    valueNoiDungVal.style.opacity = "0";
} : {};

function checkName() {
    valueNameVal.style.opacity = "1";
    isName = false;
};

function checkEmptyEmail() {
    valueEmailVal.style.opacity = "1";
    isEmail = false;
};

function CheckMailVaildate() {
    var Email = document.getElementById('Email').value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (Email.match(mailformat)) {
        isEmail = true;
    } else {
        valueEmailVal.style.opacity = "1";
        isEmail = false;
    }
};

function checkComment() {
    if (valueNoiDung.value === '') {
        valueNoiDungVal.style.opacity = "1";
        isComment = false;
    } else {
        valueNoiDungVal.style.opacity = "0";
        isComment = true;
    }
};

function checkValidate() {
    valueName.value ? isName = true : checkName();
    valueEmail.value ? CheckMailVaildate() : checkEmptyEmail();
    valueNoiDung.value !== "" ? isComment = true : checkComment();
    isName === true && isEmail == true && isComment === true ? isValidate = true : isValidate = false;
}

function sendMail() {
    var Hovaten = document.getElementById('HovaTen').value;
    var Mail = document.getElementById('Email').value;
    var NoiDung = document.getElementById('Noidung').value;
    Email.send({
        SecureToken: "62905d79-1ce1-4f21-a94b-2bc1b9eeff93 ",
        To: "omatabi520@gmail.com",
        From: Mail,
        Subject: "[Đăng kí nhận tin] - " + Mail + " - " + Hovaten,
        Body: NoiDung
    }).then(
        alert('Gửi thành công')
    );
    Redirect();
}

function Redirect() {
    location.reload()
}

function checkValue() {
    checkValidate();
    console.log(isValidate);
    isValidate === false ? {} : sendMail();
}