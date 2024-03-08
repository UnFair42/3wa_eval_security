async function sendjwt(e, action) {
  e.preventDefault();
  let jwt = localStorage.getItem("jwt");

  if (!jwt) {
    jwt = "";
  }
  try {
    await fetch("http://localhost:3000/api/verify_jwt.php", {
      method: "POST",
      headers: {
        "Content-type": "application/json",
      },
      body: JSON.stringify({
        jwt: jwt,
      }),
    });
  } catch (error) {
    print("error".$e);
  }

  window.location.href = `http://localhost:3000/?action=${action}`;
}
