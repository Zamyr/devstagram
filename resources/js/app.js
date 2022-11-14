import Dropzone from 'dropzone'

Dropzone.autoDiscover = false;

const dropzone =  new Dropzone('#dropzone', {
    dictDefaultMessage: 'Upload Image',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Delete File',
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="image"]').value.trim()){
            const image = {}
            image.size = 1234
            image.name = document.querySelector('[name="image"]').value

            this.options.addedfile.call(this, image)

            this.options.thumbnail.call(this, image, `/uploads/${image.name}`)

            image.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
})

dropzone.on('success', function(file, response){
    document.querySelector('[name="image"]').value = response.image;
})

dropzone.on('removedfile', () => {
    document.querySelector('[name="image"]').value = ''
})