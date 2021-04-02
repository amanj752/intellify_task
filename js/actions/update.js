// GLOBAL
const selector = name => (
    document.querySelector(name)
)

const getValues = name => (
    name.value
)

const clearInput = name => (
    name.value = ""
)

// VARIABLES
const fullname = selector("#fullname")
const school = selector("#school")
const contact = selector("#contact")
const tID = selector("#tID")
const sID = selector("#sID")
const submit = selector("#submit")
const alertBox = selector("#alert")


// FUNCTIONS
const changeBtn = state => {
    if(state) {
        submit.disabled = true
        submit.textContent = "Processing"
    }
    else{
        submit.disabled = false
        submit.textContent = "Submit"
    }
}

const clear = () =>{
    clearInput(fullname);
    clearInput(contact);
    clearInput(school);
}
 
const update = async () => {
    const url = "http://localhost/project/handlers/update_handler.php"

    const formData = new FormData();
    formData.append("fullname", getValues(fullname))
    formData.append("school", getValues(school))
    formData.append("contact", getValues(contact))
    formData.append("tID", getValues(tID))
    formData.append("sID", getValues(sID))
    formData.append("submit","")

    const options = {
        method: "Post",
        body: formData
    }

    const request = await fetch(url, options)
    const response = await request.json()

    const {error, message} = response
    
    if(error){
        changeBtn(false)
        showAlert('', error)
        return
    }
    onSuccess(message) 
}

const onSuccess = (mgs) => {
    showAlert("success", mgs)
    changeBtn(false)
    clear()
    redirect()
}

const redirect = () => {
    location.href = "./index.php";
}

const showAlert = (type, message) => {
    if(type === "success"){
        swal(`${message}`, "", "success")
    }else{
        swal(``, `${message}`, "error")
    }
}


// EVENTS
submit.onclick = (e) => {
    e.preventDefault()
    changeBtn(true)
    update().catch(err => {
        showAlert("", err);
    })
}
