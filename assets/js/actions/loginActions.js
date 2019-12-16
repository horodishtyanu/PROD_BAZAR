import Cookies from 'js-cookie';

export const LOGIN = 'LOGIN';
export const LOGOUT = 'LOGOUT';
export const LOGIN_PROCESS = 'LOGIN_PROCESS';

export function loginPost(authData) {
    return (dispatch, getState, api ) => {
        dispatch(processLogin());
        api.auth(authData.code, authData.phone).then(res => {
            if (res.token) {
                dispatch(login({isAuth: true, isChoice: res.isChoice, token: res.token}));
            } else {
                dispatch(logout());
            }
        })
    };
}

export function checkToken() {
    return (dispatch, getState, api ) => {
        api.checkToken(getState().user.token).then(res => {
            if (res.token) {
                dispatch(login({isAuth: true, isChoice: res.isChoice, token: res.token}));
            } else {
                dispatch(logout());
            }
        })
    };
}

export function login(data) {
    Cookies.set('token', data.token);
    return {
        type: LOGIN,
        payload: data,
    }
}

export function processLogin() {
    return {
        type: LOGIN_PROCESS
    }
}

export function logout() {
    Cookies.remove('token');
    return {
        type: LOGOUT,
        payload: {isAuth: false, token: ''}
    }
}