$(document).ready(function() {
    var jobStatusElement = document.querySelectorAll("#job_status");

    for(i=0;i<jobStatusElement.length;i++){
    var jobStatusValue = jobStatusElement[i].innerText;

    if (jobStatusValue === 'hiring') {
      jobStatusValue = "currently " + jobStatusValue;
      jobStatusElement[i].innerText=jobStatusValue;
      jobStatusElement[i].style.color="#99cc00"; //green

    } else {
        jobStatusElement[i].style.color="cc0000"; //red

    }

}
  });