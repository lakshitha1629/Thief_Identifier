// Teachable Machine
// The Coding Train / Daniel Shiffman
// https://thecodingtrain.com/TeachableMachine/1-teachable-machine.html
// https://editor.p5js.org/codingtrain/sketches/PoZXqbu4v

// The video
let video;
//var canvas;
var bar1;
var bar2;
let img; // Declare variable 'img'.
// For displaying the label
let label = "waiting...";
let second=0;
// The classifier
let classifier;
let modelURL = 'https://teachablemachine.withgoogle.com/models/W5QayD_O/';

// STEP 1: Load the model!
function preload() {
 
  classifier = ml5.imageClassifier(modelURL + 'model.json');
}

function setup() {
  createCanvas(1200, 400);
  input = createFileInput(handleFile);
  input.position(1000, 300);
  //canvas.parent('jumbo-canvas');
  

  bar1 = createElement('bar1','');
  bar2 = createElement('bar2','');
  // Create the video
 // video = createCapture(VIDEO);
  //video.hide();
  //image(img, 0, 0);
 // img.resize(640, 520);
  // STEP 2: Start classifying
  //classifyImag();
  
}

// STEP 2 classify the videeo!
function classifyImage() {
  classifier.classify(img, gotResults);
}

function draw() {
//  background(0);

  if (img) {
    image(img, width/2.5, 0, 400, 400);
  }
  // STEP 4: Draw the label
  textSize(20);
  textAlign(CENTER, CENTER);
  fill(255,0,0);
  text(label, width / 2, height / 16);

  // Pick an emoji, the "default" is train
//  let emoji = "🚂";
  if (label == "Correct") {
    emoji = "Correct";
  } else if (label == "Incorrect") {
    emoji = "Incorrect";
  } 

  // Draw the emoji
  textSize(256);
  //text(emoji, width / 2, height / 2);
}

function handleFile(file) {
  print(file);
  if (file.type === 'image') {
    img = createImg(file.data, '');
    //images.push(img);
    img.hide();
    classifyImage()
   // posiX=posiX+200;
  } else {
    img = null;
  }
}

// STEP 3: Get the classification!
function gotResults(error, results) {
  // Something went wrong!
  if (error) {
    console.error(error);
    return;
  }
  // Store the label and classify again!
  second=results[1].confidence;
  // if(float(second)<1){
  //   second=0;
  // }
  label = results[0].label+" "+results[0].confidence+" | "+results[1].label+" "+results[1].confidence;

    if(results[0].label=="Incorrect"){
      bar1.html("<div id=\"home\" class=\"container\">"+results[0].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar bg-danger\" style=\"width:"+results[0].confidence*100+"%;height:30px\"><h5>"+results[0].confidence*100+"%</h5></div></div></div><br>");
      bar2.html("<div id=\"home\" class=\"container\">"+results[1].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[1].confidence*100+"%;height:30px\"></div><h5>"+results[1].confidence*100+"%</h5></div></div>");
    }else{
      bar1.html("<div id=\"home\" class=\"container\">"+results[0].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[0].confidence*100+"%;height:30px\"><h5>"+results[0].confidence*100+"%</h5></div></div></div><br>");
      bar2.html("<div id=\"home\" class=\"container\">"+results[1].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar bg-danger\" style=\"width:"+results[1].confidence*100+"%;height:30px\"></div><h5>"+results[1].confidence*100+"%</h5></div></div>");
    }

  
  
  
  //classifyVideo();
  // document.getElementById("label").innerHTML =results[0].label;
  // document.getElementById("value").innerHTML =results[0].confidence*100;

  
  print(results)
  print(second);
}
