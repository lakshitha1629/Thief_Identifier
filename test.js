
// ml5 Face Detection Model
let faceapi;
let detections = [];

// Video
let video;

function setup() {
  createCanvas(360, 270);

  // Creat the video and start face tracking
  video = createCapture(VIDEO);
  video.size(width, height);
  // Only need landmarks for this example
  const faceOptions = { withLandmarks: true, withExpressions: false, withDescriptors: false };
  faceapi = ml5.faceApi(video, faceOptions, faceReady);
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

// Draw everything
function draw() {
  background(0);

  // Just look at the first face and draw all the points
  if (detections.length > 0) {
    console.log('detected face');

    }
    
    else{
    console.log('NO face');
  }
  

}