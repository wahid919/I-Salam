<?php 
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
apiKey: "AIzaSyA2k9puWuPoPsbYbMnDPMvRqOHJT6ofJpg",
authDomain: "i-salam.firebaseapp.com",
projectId: "i-salam",
storageBucket: "i-salam.appspot.com",
messagingSenderId: "926703579629",
appId: "1:926703579629:web:c2c3f31c7259659d3ef7e4",
measurementId: "G-JQ6PRDHHR6"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
?>