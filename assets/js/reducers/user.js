import { LOGIN } from '../actions/loginActions'
import { LOGOUT } from '../actions/loginActions'
import Cookies from 'js-cookie';

const initialState = {
    isAuth: false,
    token : Cookies.get('token'),
};

export function userReducer(state = initialState, action) {
    switch (action.type) {
        case LOGIN:
            return { ...state, ...action.payload }
        case LOGOUT:
            return { ...state, ...action.payload }
        default:
            return state
    }
}