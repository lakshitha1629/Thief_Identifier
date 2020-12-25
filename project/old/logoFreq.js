let img;

let label = "waiting...";
let second=0;
// The classifier
let classifier;
let modelURL = 'https://teachablemachine.withgoogle.com/models/rExNuVkX/';
var posiX=0;
var posiY=0;
var posiX2=0;
var posiYd=false;
var incorrect=0;
var cream=0;
var rich=0;

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
 ;
  textAlign(CENTER, CENTER);
  fill(255,0,0);
  textSize(20)
  text("Frequency of Shirts :\n", width-120, 100);
 
  text("( Cream ) :\n", width-120, 150);
  textSize(80);
  text(cream+"/"+images.length, width-120, 200);

  textSize(20)
  text("( Rich ) :\n", width-120, 280);
  textSize(80);
  text(rich+"/"+images.length, width-120, 320);

  textSize(20)
  text("( Incorrect ) :\n", width-120, 400);
  textSize(80);
  text(incorrect+"/"+images.length, width-120, 450);
 
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
   if(second=="Incorrect"){
    incorrect++;
   // console.log(rightCount);
   }
   if(second=="The Cream"){
    cream++;
   // console.log(rightCount);
   }
   if(second=="Allen Rich"){
    rich++;
   // console.log(rightCount);
   }

  if (img) {
    console.log(results[0].label);
  }

  
  print(results)

}