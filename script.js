const firebaseConfig = {
    apiKey: "AIzaSyBx3wUzSy2onTU1hP9WskPj23_CTf6SgKE",
    authDomain: "wanderlog-96f7c.firebaseapp.com",
    databaseURL: "https://wanderlog-96f7c-default-rtdb.firebaseio.com",
    projectId: "wanderlog-96f7c",
    storageBucket: "wanderlog-96f7c.appspot.com",
    messagingSenderId: "439364023250",
    appId: "1:439364023250:web:9cccb5222e8d106bd90e0b",
    measurementId: "G-5HP34MEWGE"
  };

  firebaseConfig.initializeApp(firebaseConfig);

  var WanderlogDB = firebaseConfig.databse().ref("Wanderlog");

  document.getElementById("Wanderlog").addEventListener("submit", submitForm);

  function submitForm(e){
    e.preventDefault();
  }

  const getElementVal = (id) => {
    return document.getElementById(id).ariaValueMax;
  }