const initApp = () => {
    const droparea = document.querySelector('.droparea');

    // Checks if the dropare is not empty
    if (droparea != null) {
        const active = () => droparea.classList.add('border-green-400');

        const inactive = () => droparea.classList.remove('border-green-400');

        const prevents = (e) => e.preventDefault();

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(evtName => {
            droparea.addEventListener(evtName, prevents);
        });

        ['dragenter', 'dragover'].forEach(evtName  => {
            droparea.addEventListener(evtName, active);
        });

        ['dragleave', 'drop'].forEach(evtName => {
            droparea.addEventListener(evtName, inactive);
        })

        droparea.addEventListener("drop", handleDrop);
    }
}

document.addEventListener('DOMContentLoaded', initApp);


const handleDrop = (e) => {
    const dt = e.dataTransfer;
    const files = dt.files;
    const fileArray = [...files];

    
    const dataTransfer  = new DataTransfer();
    const input = document.getElementById('imageCreate');
    const newestFile = (fileArray.length) - 1;

    for (let i = 0; i < newestFile; i++) {
        dataTransfer.items.add(fileArray[i]);
    }
    
    // Puts the file in the input
    input.files = dataTransfer.files;
    $('#fileDisplay').fadeIn().removeClass('hidden').html('Bestands naam: '+fileArray[0]['name']);
    $('#uploadTitle').fadeOut().addClass('hidden')
}