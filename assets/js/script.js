function handleFormSubmit(event) {
    event.preventDefault();
    
    const enrollmentType = document.getElementById('enrollment-type').value;
    const initialForm = document.getElementById('initial-form');
    const newEnrolleeForm = document.getElementById('new-enrollee-form');
    const existingEnrolleeForm = document.getElementById('existing-enrollee-form');

    initialForm.classList.add('hidden');
    
    if (enrollmentType === 'new') {
        newEnrolleeForm.classList.remove('hidden');
    } else if (enrollmentType === 'existing') {
        existingEnrolleeForm.classList.remove('hidden');
    }
}