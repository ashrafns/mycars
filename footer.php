  <!-- Footer Start -->
  <div class="container py-4 bg-secondary text-center">
      <p class="m-0 text-white">
          &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by <a
              class="text-white font-weight-bold" href="">Ashraf Nasr</a>
      </p>
  </div>
  <!-- Footer End -->
  </div>
  </div>

  <!-- Back to Top -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="mail/jqBootstrapValidation.min.js"></script>
  <script src="mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>

  <!-- firebase -->
  <script type="module">
// Import the functions you need from the SDKs you need
import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/11.7.1/firebase-app.js";
import {
    getAnalytics
} from "https://www.gstatic.com/firebasejs/11.7.1/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
import {
    getDatabase,
    set,
    get,
    child,
    ref
} from "https://www.gstatic.com/firebasejs/11.7.1/firebase-database.js";




// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBej-zU2RIvMsv7BWyHheRzPqSH32kXXeA",
    authDomain: "fundacrud-51013.firebaseapp.com",
    databaseURL: "https://fundacrud-51013-default-rtdb.firebaseio.com",
    projectId: "fundacrud-51013",
    storageBucket: "fundacrud-51013.firebasestorage.app",
    messagingSenderId: "220662569444",
    appId: "1:220662569444:web:44320c08cdade383584ff1",
    measurementId: "G-D0G9G7XVWY"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

const database = getDatabase(app);

const analytics = getAnalytics(app);

const dbRef = ref(getDatabase());

// console.log(dbRef);
get(ref(database, `fundacrud`)).then((snapshot) => {
    if (snapshot.exists()) {
        console.log(snapshot.val());
    } else {
        console.log("No data available");
    }
}).catch((error) => {
    console.error(error);
    console.log("error from firebase");
});
  </script>
  <!-- firebase -->
  <!-- <img src="https://d41chssnpqdne.cloudfront.net/user_upload_by_module/chat_bot/files/1013489/bAhtbCieRjB7Jp46.png?Expires=1760836319&Signature=OkuDPS4T-5JadUxqE7ed36L1Ei7LHWNr7vGiLVMzkEMq9qGb34kUXYGx3pcuKPeSu8lKxvhx21hHLBAXQOL9krquoNd8azUntVy6OU~Hw742wr9uD43BGojQab4q4S9S2HlK8vU48UUCXltWMualDmumu~PXDbPKuCs0nwPzrrjeKEcHRq-Vm9Xp3qTkNiCKj3~Bd7qm4Ld1oZVydNGZjNWsTNGZC2C87~9OXO9gcvv2ACfY2lpzrpYbdpLcBQLJFBtFW1U1QQgdZxTl1d1EiHNQeQkWcxmJ7U4puupEP1Ju2mkaIDL471pVF1lsNv-MQKzri4meEPMycZloxbb-OA__&Key-Pair-Id=K3USGZIKWMDCSX" alt="AL-SAMI REAL ESTATE Logo"> -->


  </body>

  </html>