function parseResponseCode(response_code) {
    var response = "";
    switch(response_code) {
        case '0':
            response = "Failed";
            break;
        case '100':
            response = "Success";
            break;
        case '400':
            response = "UserNotFound";
            break;
        case '500':
            response = "IncorrectPassword";
            break;
        default:
            response = "Unknown";
            break;
    }
    return response;
}

export {parseResponseCode};