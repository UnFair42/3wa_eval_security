async function storejwt(e) {
  e.preventDefault();
  const formData = document.forms[0];
  const email = formData[0].value;
  const password = formData[1].value;

  const response = await fetch("http://localhost:3000/api/login.php", {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify({
      email: email,
      password: password,
    }),
  });

  if (response.status >= 200 && response.status <= 299) {
    const jwt = await response.json();
    localStorage.setItem("jwt", jwt.jwt);
    window.location.href = `http://localhost:3000/`;
  } else {
    console.log(response.status, response.statusText);
  }
}

/*
const storeJWT = {};
const loginBtn = document.querySelector("#frmLogin");
const btnResource = document.querySelector("#btnGetResource");
const formData = document.forms[0];

storeJWT.setJWT = function (data) {
  this.JWT = data;
};

loginBtn.addEventListener("submit", async (e) => {
  e.preventDefault();

  const response = await fetch("/authenticate.php", {
    method: "POST",
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: JSON.stringify({
      username: formData.inputEmail.value,
      password: formData.inputPassword.value,
    }),
  });

  if (response.status >= 200 && response.status <= 299) {
    const jwt = await response.text();
    storeJWT.setJWT(jwt);
    frmLogin.style.display = "none";
    btnResource.style.display = "block";
  } else {
    console.log(response.status, response.statusText);
  }
});
*/
