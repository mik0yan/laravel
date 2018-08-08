
const baseURL = "https://api.hezhongyimeng.com/api"

const logInURL = baseURL + "/auth/login"
const registerURL = baseURL + "/auth/register"
const logOutURL = baseURL + "/auth/logout"
const authMeURL = baseURL + "/auth/me"

const goodURL = baseURL + "/good"
const goodShowURL = baseURL + "/good/1"


export default {
    logIn: logInURL,
    register: registerURL,
    authMeURL: authMeURL,
    logInURL: logOutURL,
    goodURL: goodURL
}