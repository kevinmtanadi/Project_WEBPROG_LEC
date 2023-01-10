const input = document.querySelector('.content');
const output = document.querySelector('.output');
const footer = document.querySelector('.post-footer');
const caption = document.querySelector('.caption');
const captionText = document.querySelector('.caption textarea');

let file;

input.addEventListener('change', () => {
    file = input.files[0];
    displayImage();
});

function clearPost() {
    input.value = null;
    output.innerHTML = "";
    output.style.display = 'none';
    footer.innerHTML = "";
    caption.style.display = 'none';
    captionText.value = "";
}

function displayImage() {
    var image_div = ""
    let fileType = file.type;
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if (validExtensions.includes(fileType)) {
        let fileReader = new FileReader();
        fileReader.onload = ()=> {
            let fileUrl = fileReader.result;
            let imgTag = `<div>
                            <img class="img-fluid" src="${fileUrl}" alt="">
                        </div>
                        `
            output.style.display = 'block';
            output.innerHTML = imgTag;
        }
        fileReader.readAsDataURL(file);

        output.style.display = 'block';
        output.innerHTML = image_div;
        caption.style.display = 'block';

        footer.innerHTML = `
        <input type="submit" class="btn btn-3" value="Post">
        `
    }
    else {
        alert("File type unsupported!");
        drop.classList.remove('active');
        text.textContent = "Drag and drop your photo here!"
    }

}

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

const profilePic = document.querySelector('.profilePic');
const saveBtn = document.querySelector('.save');
const takeInput = document.querySelector('.take-input');

function resetProfilePicModal() {
    saveBtn.style.display = 'none';
    takeInput.style.display = 'block';
    profilePic.files[0] = null;
}

profilePic.addEventListener('change', () => {

    let fileType = profilePic.files[0].type;
    let validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/webp"];

    if (validExtensions.includes(fileType)) {
        saveBtn.style.display = 'block';
        takeInput.style.display = 'none';

    }
    else {
        alert("File type unsupported!");
    }
});