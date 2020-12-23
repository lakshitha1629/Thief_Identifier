let img;

let label = "waiting...";
let second=0;
// The classifier
let classifier;
let modelURL = 'https://teachablemachine.withgoogle.com/models/W5QayD_O/';
var posiX=0;
var posiY=0;
var posiX2=0;
var posiYd=false;
var rightCount=0

var images = [];

function preload() {
 
 classifier = ml5.imageClassifier(modelURL + 'model.json');
}

function setup() {
  var canvas=createCanvas(1200, 800);
  input = createFileInput(handleFile);
  input.position(width-220, 300);
 // noLoop();
}

function draw() {
  background(255);

  if(images.length>0){
    console.log(posiX)
    

      for ( var z = 0; z < images.length; z++) {
        if(posiX<900){
          image(images[z], posiX, posiY, 100, 100 );
          posiX=posiX+100;
        }else{
          image(images[z], posiX2, posiY+100, 100, 100 );
          posiX2=posiX2+100;
        }
      }
  }
  posiX=0;
  posiX2=0;
 // console.log(images.length);
  textSize(20);
  textAlign(CENTER, CENTER);
  fill(255,0,0);
  text("Frequency of Correct Shirts :\n", width-120, height / 10);
  textSize(80);

  text(rightCount+"/"+images.length, width-120, height / 6);
 
}

function classifyImage() {
  classifier.classify(img, gotResults);
}

function handleFile(file) {
  print(file);
  if (file.type === 'image') {
    img = createImg(file.data, '');
    images.push(img);
    img.hide();
    classifyImage()
    posiX=posiX+200;
  } else {
    img = null;
  }
}

function gotResults(error, results) {
  // Something went wrong!
  if (error) {
    console.error(error);
    return;
  }
  // Store the label and classify again!
  second=results[0].label;
   if(second=="Correct"){
    rightCount++;
    console.log(rightCount);
   }

  if (img) {
    console.log(results[0].label);
  }

  
  print(results)

}