function saveData( emp_id) {
    // Store data in sessionStorage
    sessionStorage.setItem('EMP_ID', emp_id);

    // Provide feedback to the user
    document.getElementById('output').innerText = 'Data saved successfully!';
    console.log("Data saved successfully!");	

    console.log(sessionStorage.getItem('EMP_ID'));
}