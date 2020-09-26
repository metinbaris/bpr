function toggleOrderNumber () {
  document.getElementById('enquiry_type_dependent').classList.toggle('hidden')
}

/*FORM VALIDATION*/
const name = document.getElementById('customer_name')
const email = document.getElementById('email_address')
const message = document.getElementById('message')
const orderNumber = document.getElementById('order_number')
const enquiryType = document.getElementById('enquiry_type')
const termsAndConditionsCheckBox = document.getElementById('terms_and_conditions')
const contactForm = document.getElementById('contact_form')

const requiredFormElements = [name, email, message, enquiryType, termsAndConditionsCheckBox]
contactForm.addEventListener('submit', (e) => {
  isChecked(termsAndConditionsCheckBox)
  isEnquiryTypeRegardingAnOrder(enquiryType)
  requiredFormElements.forEach(element => checkEmpty(element))
  submitTheFormIfValid(e)
})

function checkEmpty (element) {
  if (element.value === '') {
    setErrorFor(element, element.placeholder + ' field cannot be blank')
  } else {
    removeErrorFor(element)
  }
}

function setErrorFor (element, message) {
  const formControl = element.parentElement
  const small = formControl.querySelector('small')
  formControl.classList.add('error')
  small.innerText = message
  small.classList.remove('hidden')
}

function removeErrorFor (element) {
  const formControl = element.parentElement
  const small = formControl.querySelector('small')
  formControl.classList.remove('error')
  small.classList.add('hidden')
}

function isChecked (checkbox) {
  if (!checkbox.checked) {
    checkbox.value = ''
  } else {
    checkbox.value = 'on'
  }
}

/*Order number is required, check the validation of it*/
function isEnquiryTypeRegardingAnOrder (element) {
  if (element.value === CONSTANTS.EnquiryModel.Type_of_Enquiry_Regarding_An_Order) {
    checkEmpty(orderNumber)
    checkIsNumeric(orderNumber)
    checkElementNumberCharLength(orderNumber, CONSTANTS.EnquiryModel.Order_Number_Char_Length)
  } else {
    orderNumber.value = ''
    removeErrorFor(orderNumber)
  }
}

function checkIsNumeric (element) {
  if (!/^\d+$/.test(element.value) && element.value.length > 0) {
    setErrorFor(element, element.placeholder + ' should be numeric')
  }
}

function checkElementNumberCharLength (element, charLength) {
  if (element.value.length !== charLength && element.value.length > 0) {
    setErrorFor(element, element.placeholder + ' should have ' + charLength + ' digits')
  }
}

function submitTheFormIfValid (form) {
  let anyErrors = document.getElementsByClassName('error')
  if (anyErrors.length !== 0) {
    form.preventDefault()
  }
}

/*Server Side Validation Show Error Message*/
setTimeout(function () {
  let flashMessage = document.getElementById('flash-message')
  if (flashMessage != null) {
    flashMessage.classList.toggle('hidden')
  }
}, 3500)