// ml5 Face Detection Model
let faceapi;
let detections = [];

// The video
let video;
// For displaying the label
let label = "waiting...";
let label2 = "waiting...";

let ges = "waiting...";
let gesCon = "waiting...";

// The classifier
let classifier;
let modelURL = "model/";

// STEP 1: Load the model!
function preload() {
  classifier = ml5.imageClassifier(modelURL + "model.json");
}

function setup() {
  // createCanvas(640, 520);

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
  image(video, 0, 0);

  // Just look at the first face and draw all the points
  if (detections.length > 0) {
    console.log("detected face");
    console.log(label2);

    if (label2 > 0.8) {
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
        // else{
        //   emoji = "Normal Person";
        // }
      }

      emoji = "Normal Person";

      let arr = [a, b, c, d, e, no];
      let z = max(arr);

      if (z == a) {
        emoji = "Lahiru - Thief";
      } else if (z == b) {
        emoji = "Kasun - Thief";
      } else if (z == c) {
        emoji = "Namal - Thief";
      } else if (z == d) {
        emoji = "Nishan - Thief";
      } else if (z == e) {
        emoji = "Tasil - Thief";
      } else if (z == no) {
        emoji = "Thisal - Normal Person";
      } else {
        emoji = "Normal Person";
      }

      // Draw the emoji
      textSize(50);
      text(emoji, width / 2, height / 2);
    } else {
      console.log("Low Accuracy");
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

  ges = results[1].label;
  gesCon = results[1].confidence;
  print(label2);
  // con = results[1].label;
  // con2 = results[1].confidence;
  classifyVideo();
}
