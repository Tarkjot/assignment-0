/** document.getElementByID
 * @param {string} name
 * @return {string} name
 */
function selectElement(name) {
  return document.getElementById(name);
}

var handleSignUp = {
  userName: selectElement(userReq),
  password: selectElement(passReq),
  email: selectElement(emailReq),
  city: selectElement(cityReq),
  date: selectElement(dateReq),
  age: selectElement(ageReq),
  intro: selectElement(introReq),
  roles: selectElement(roleReq),
  image: selectElement(imageReq),
  gender: document.getElementsByName(genderReq),
  dsgn: document.getElementsByName(dsgnReq),
  multi: selectElement(multiReq),

  /** Making the border and error message Red
   * @param {string} req input element whose border is to be changed to Red
   * @param {string} msg error message id for showing the error message in red
   *
   */
  red_brdr: function(req, msg) {
    selectElement(req).style["border-color"] = "red";
    selectElement(msg).style["color"] = "red";
  },

  /**
   * Showing Error message and calling red_brdr to make it red
   *@param {string} req_id for passing it to red_brdr
   *@param {string} msg_id where message is shown
   *@param {string} err_msg error message to be displayed
   */
  warningMsg: function(req_id, msg_id, err_msg) {
    selectElement(msg_id).innerHTML = err_msg;
    this.red_brdr(req_id, msg_id);
  },

  /** Changing border color from red to normal and disappearing the error message
   * @param {string} x input element for border
   * @param {string} y  id where message shown to be emptied
   *
   */

  remove_warning: function(x, y) {
    selectElement(x).style["border-color"] = "#F8F8F8";
    selectElement(y).innerHTML = "";
  },

  /**
   * Removing captcha warning.
   */
  verifyCaptcha: function() {
    document.getElementById("g-recaptcha-error").innerHTML = "";
  },

  /**
   * Validating Captcha
   */
  CaptchaValid: function() {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      selectElement("g-recaptcha-error").innerHTML =
        '<span style="color:red;">This field is required.</span>';
    }
  },

  /**
   * Validating email.
   * @param {string} email
   */
  emailValid: function(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email === "") {
      this.warningMsg(emailReq, emailMsg, EmailEmptyErrMsg);
    } else if (!email.match(mailformat)) {
      this.warningMsg(emailReq, emailMsg, EmailIncrrtErrMsg);
    }
  },

  /**
   * Validating Age
   * @param {string} age
   */
  ageValid: function(age) {
    if (age === "") {
      this.warningMsg(ageReq, ageMsg, AgeEmptyErrMsg);
    } else if (isNaN(age)) {
      this.warningMsg(ageReq, ageMsg, AgeNaNErrMsg);
    } else if (age < 10 || age > 50) {
      this.warningMsg(ageReq, ageMsg, AgeRangeErrMsg);
    }
  },

  /**
   * checking options from radio buttons
   *
   * @param {array} optns values to be checked
   * @return {boolean} true if not a single option is checked
   */
  validoptions: function(optns) {
    var i = 0;
    var flag = 0;

    //validation on radio button
    for (i = 0; i < optns.length; i++) {
      if (optns[i].checked) {
        flag = 1;
      }
    }
    if (flag != 1) {
      //not a single option is checked
      return true;
    }
    return false;
  },

  /**
   * Validating multiple select field
   *
   * @param {array} multi multiple options to be checked.
   * @return {boolean} true if not a single option is checked.
   */
  validMultiOptns: function(multi) {
    for (var i = 0; i < multi.selectedOptions.length; i++) {
      if (multi.selectedOptions[i].value) {
        break;
      }
    }
    if (i == multi.selectedOptions.length) {
      return true;
    }

    return false;
  },

  /**
   * applies validation on all form fields .
   */

  error_msg: function() {
    event.preventDefault();

    if (this.userName.value === "") {
      this.warningMsg(userReq, userMsg, UserErrMsg);
    }
    if (this.password.value === "") {
      this.warningMsg(passReq, passMsg, PswdErrMsg);
    }
    if (this.date.value === "") {
      this.warningMsg(dateReq, dateMsg, DateErrMsg);
    }
    if (this.intro.value === "") {
      this.warningMsg(introReq, introMsg, IntroErrMsg);
    }
    if (this.city.value === "") {
      this.warningMsg(cityReq, cityMsg, CityErrMsg);
    }
    if (this.roles.value === "") {
      this.warningMsg(roleReq, roleMsg, RoleErrMsg);
    }
    if (this.image.value === "") {
      this.warningMsg(imageReq, imageMsg, ImageErrMsg);
    }

    this.emailValid(this.email.value);
    this.ageValid(this.age.value);

    if (this.validoptions(this.gender)) {
      this.warningMsg("1", genderMsg, GenderErrMsg);
    }

    //validation on checked
    if (this.validoptions(this.dsgn)) {
      this.warningMsg("4", dsgnMsg, DsgnErrMsg);
    }

    //validation on multiselect
    if (this.validMultiOptns(this.multi)) {
      this.warningMsg(multiReq, multiMsg, MultiErrMsg);
    }

    //Captcha validation
    //this.CaptchaValid();
  }
};

// Jquery & its plugins
// Jquery Home , HTML , Traversing , Ajax, JSON
// MVC
// REST API's
// Caching
