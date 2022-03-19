// login
const loginBtn = document.querySelector('.top-menu__all__account');
const loginBox = document.querySelector('.login-box');
const loginBoxBack = document.querySelector('.login-box i');
if (loginBtn && darkBackground) {
    loginBtn.addEventListener('click', () => {
        darkBackground.style.display = 'block'
        loginBox.style.display = 'flex'
    });
    darkBackground.addEventListener('click', () => {
        darkBackground.style.display = 'none'
        loginBox.style.display = 'none'
    })
}
if (loginBoxBack) {
    loginBoxBack.addEventListener('click', () => {
        darkBackground.style.display = 'none';
        loginBox.style.display = 'none'
    })
}
// signup
const signupBtn = document.querySelector('.login-to-btn');
const signupBox = document.querySelector('.signup-box');
const signupBoxBack = document.querySelector('.signup-box i');
if (signupBtn) {
    signupBtn.addEventListener('click', (e) => {
        e.preventDefault();
        darkBackground.style.display = 'block'
        signupBox.style.display = 'flex'
        loginBox.style.display = 'none'
    });
    darkBackground.addEventListener('click', () => {
        darkBackground.style.display = 'none'
        signupBox.style.display = 'none'
    })
}
if (signupBoxBack) {
    signupBoxBack.addEventListener('click', () => {
        darkBackground.style.display = 'none';
        signupBox.style.display = 'none'
    })
}
const haveAccount = document.querySelector('.create_account');
if (haveAccount) {
    haveAccount.addEventListener('click', () => {
        signupBox.style.display = 'none';
        loginBox.style.display = 'flex';
    })
}
const resetPass = document.querySelector('.reset-pass');
const resetPassBox = document.querySelector('.reset-pass-box');
const resetBoxBack = document.querySelector('.reset-pass-box i');
if (resetPass) {
    resetPass.addEventListener('click', () => {
        loginBox.style.display = 'none';
        darkBackground.style.display = 'block'
        resetPassBox.style.display = 'flex';
    })
    darkBackground.addEventListener('click', () => {
        darkBackground.style.display = 'none'
        resetPassBox.style.display = 'none'
    })
}
if (resetBoxBack) {
    resetBoxBack.addEventListener('click', () => {
        darkBackground.style.display = 'none';
        resetPassBox.style.display = 'none'
    })
}