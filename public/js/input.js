var survey_options = document.getElementById("survey_options");
var add_more_fields = document.getElementById("add_more_fields");
var remove_fields = document.getElementById("remove_fields");
var i = 2;
add_more_fields.onclick = function () {
    var titleField = document.createElement("input");
    var videoField = document.createElement("input");
   //var photoField = document.createElement("input");
    var area = document.createElement("textarea");
    var label = document.createElement("label");
    //label
    label.setAttribute("id", "label");
    var labelAttribute = document.getElementById("label");
    // var ok =survey_options.appendChild(labelAttribute)
    //console.log(ok,label,labelAttribute,remove_fields);
    //textarea
    area.setAttribute("placeholder", `Description de l'épisode ${i++}`);
    area.setAttribute("name", "description[]");
    area.setAttribute("class", "form-control mb-2");
    area.setAttribute("cols", "30");
    area.setAttribute("rows", "10");
    area.setAttribute("id", "summer");
    //input text
    titleField.setAttribute("type", "text");
    titleField.setAttribute("name", "title[]");
    titleField.setAttribute("class", "form-control");
    titleField.setAttribute("size", 50);
    titleField.setAttribute("placeholder", `Titre de l'épisode ${i - 1}`);

    //input video
    videoField.setAttribute("type", "file");
    videoField.setAttribute("name", "video[]");
    videoField.setAttribute("class", "form-control mb-2");
    videoField.setAttribute("size", 50);

    //input photo
    /* photoField.setAttribute("type", "file");
    photoField.setAttribute("name", "photo_episode[]");
    photoField.setAttribute("class", "form-control mb-2");
    photoField.setAttribute("size", 50); */

    survey_options.appendChild(titleField);
    survey_options.appendChild(videoField);
    /* survey_options.appendChild(photoField); */
    survey_options.appendChild(area);
};

remove_fields.onclick = function () {
    var input_tags = survey_options.getElementsByTagName("input");
    var test = survey_options.getElementsByTagName("textarea");
    var input_fiel = survey_options.getElementsByTagName("input");
    /* var input_photo = survey_options.getElementsByTagName("input"); */

    //console.log(test.length,input_tags.length);
    if (
        input_tags.length > 1 &&
        test.length > 1 &&
        input_fiel.length > 1 &&
        input_photo.length > 1
    ) {
        survey_options.removeChild(input_tags[input_tags.length - 1]);
        survey_options.removeChild(test[test.length - 1]);
        survey_options.removeChild(input_fiel[input_fiel.length - 1]);
        survey_options.removeChild(input_photo[input_photo.length - 1]);
    }
};

/* //This function is added later [update]
document.getElementById("print-values-btn").onclick = function () {
    let allTextBoxes = document.getElementsByName("title[]");

    for (let i of allTextBoxes) {
        console.log(i.value); //here you will be able to see all values in the console
    }
}; */
