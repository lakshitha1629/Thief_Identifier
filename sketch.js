// ml5 Face Detection Model
let faceapi;
let detections = [];

// The video
let video;
// For displaying the label
let label = "waiting...";
let label2 = "waiting...";

// The classifier
let classifier;
let modelURL = "model/";

// STEP 1: Load the model!
function preload() {
  classifier = ml5.imageClassifier(modelURL + "model.json");
}

function setup() {
  var cnv = createCanvas(650, 480);
  // var x = (windowWidth - width) / 2;
  // var y = (windowHeight - height) / 2;
  // cnv.position(x, y);
  cnv.parent("sketchholder");
  background(255, 0, 200);

  // Create the video
  video = createCapture(VIDEO);
  video.size(width, height);
  video.hide();

  // STEP 2: Start classifying
  const faceOptions = {
    withLandmarks: false,
    withExpressions: false,
    withDescriptors: false,
  };
  faceapi = ml5.faceApi(video, faceOptions, faceReady);
  classifyVideo();
}

// Start detecting faces
function faceReady() {
  faceapi.detect(gotFaces);
}

// Got faces
function gotFaces(error, result) {
  if (error) {
    console.log(error);
    return;
  }
  detections = result;
  faceapi.detect(gotFaces);
}

// STEP 2 classify the videeo!
function classifyVideo() {
  classifier.classify(video, gotResults);
}

function draw() {
  background(0);

  fill(255, 0, 0);
  circle(30, 30, 20);
  image(video, 0, 0);

  fill(255, 0, 0);
  circle(30, 30, 20);

  // Just look at the first face and draw all the points
  if (detections.length > 0) {
    fill(0, 255, 0);
    circle(30, 30, 20);
    console.log("detected face");
    console.log(label2);

    if (label2 > 0.7) {
      // STEP 4: Draw the label
      textSize(10);
      textAlign(CENTER, CENTER);
      fill(255);
      text(label, width / 2, height - 16);
      text(label2 + "", width / 2, height - 30);

      // Pick an emoji, the "default" is train
      let a = 0;
      let b = 0;
      let c = 0;
      let d = 0;
      let e = 0;
      let no = 0;

      for (let label1 = 0; label1 < 8000; label1++) {
        if (label == "Lahiru") {
          a++;
        } else if (label == "Kasun") {
          b++;
        } else if (label == "Namal") {
          c++;
        } else if (label == "Nishan") {
          d++;
        } else if (label == "Tasil") {
          e++;
        } else if (label == "Thisal") {
          no++;
        }
      }

      emoji = "Normal Person";

      let arr = [a, b, c, d, e, no];
      let z = max(arr);
      let x = "";

      if (z == a) {
        emoji = "Lahiru - Kidnapping";
        x = "854137451V";
        alert("Provisio Detected.--> Lahiru - Kidnapping");
      } else if (z == b) {
        emoji = "Kasun - White-Collar Crime";
        x = "924871245V";
        alert("Provisio Detected.--> Kasun - White-Collar Crime");
      } else if (z == c) {
        emoji = "Namal - Rape";
        x = "834307414V";
        alert("Provisio Detected.--> Namal - Rape");
      } else if (z == d) {
        emoji = "Normal Person";
        x = "";
      } else if (z == e) {
        emoji = "Thisal - Drug Deal"; //Thisal - Thief
        x = "804164875V";
        alert("Provisio Detected.--> Thisal - Drug Deal");
      } else if (z == no) {
        emoji = "Tasil - Murder"; //Tasil - Thief
        x = "943151033V";
        alert("Provisio Detected.--> Tasil - Murder");
      } else {
        emoji = "Normal Person";
      }

	  
      // Draw the emoji
      // if (x != "") {

      // document.getElementById("demo").value = x;

      // }

      $.ajax({
        url: "addDb.php",
        type: "post",
        dataType: "json",
        data: {
          id: x,
        },
        cache: false,
        success: function (data) {
          alert("Thief Detected. Mail sent successfully");
          location.reload();
        },
        error: function (data) {
          alert("Something went downhill, this may be serious");
          // location.reload();
        },
      });

      textSize(50);
      fill(255, 171, 0);
      text(emoji, width / 2, height / 2);
    } else {
      console.log("Low Accuracy");
      fill(204, 204, 0);
      circle(30, 30, 20);
    }
  } else {
    console.log("NO face");
  }
  // Draw the video
}

// STEP 3: Get the classification!
function gotResults(error, results) {
  // Something went wrong!
  if (error) {
    console.error(error);
    return;
  }
  // Store the label and classify again!
  label = results[0].label;
  label2 = results[0].confidence;
  classifyVideo();
}
