// Teachable Machine
// The Coding Train / Daniel Shiffman
// https://thecodingtrain.com/TeachableMachine/1-teachable-machine.html
// https://editor.p5js.org/codingtrain/sketches/PoZXqbu4v

// The video
let video;
// For displaying the label
let label = "waiting...";
let label2 = "waiting...";

let ges = "waiting...";
let gesCon = "waiting...";

// The classifier
let classifier;
let modelURL = 'model/';

// STEP 1: Load the model!
function preload() {
  classifier = ml5.imageClassifier(modelURL + 'model.json');
}


function setup() {
  // createCanvas(640, 520);

  var cnv = createCanvas(650, 480);
  // var x = (windowWidth - width) / 2;
  // var y = (windowHeight - height) / 2;
  // cnv.position(x, y);
  cnv.parent('sketchholder');
  background(255, 0, 200);

  // Create the video
  video = createCapture(VIDEO);
  video.hide();
  // STEP 2: Start classifying
  classifyVideo();
}

// STEP 2 classify the videeo!
function classifyVideo() {
  classifier.classify(video, gotResults);
}

function draw() {
  background(0);

  // Draw the video
  image(video, 0, 0);

  // STEP 4: Draw the label
  textSize(10);
  textAlign(CENTER, CENTER);
  fill(255);
  text(label, width / 2, height - 16);
  text(label2+"", width / 2, height - 30);

//  text(ges+" Guess", width / 2, height - 40);
//  text(gesCon+"", width / 2, height - 50);

  // Pick an emoji, the "default" is train
  // let emoji = "🚂";
  // if (label == "Rainbow") {
  //   emoji = "🌈";
  // } else if (label == "Unicorn") {
  //   emoji = "🦄";
  // } else if (label == "Ukulele") {
  //   emoji = "🎸";
  // }

  // Draw the emoji
  textSize(256);
 // text(emoji, width / 2, height / 2);
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
