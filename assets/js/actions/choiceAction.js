import {logout} from "./loginActions";

export const CHOICE_LOADING = 'CHOICE_LOADING';
export const CHOICE_LOADED = 'CHOICE_LOADED';
export const CHOICE_PROCESS = 'CHOICE_PROCESS';
export const CHOICE_SELECTED = 'CHOICE_SELECTED';

export function choiceLoad() {
    return (dispatch, getState, api ) => {
        dispatch(choiceLoading());

        api.choice().then(res => {
            if (res.needAuth) {
                dispatch(logout());
                return;
            }
            dispatch(choiceLoaded(res))
        });
    };
}

export function choicePost(order_id,data) {
    return (dispatch, getState, api ) => {
        dispatch(processChoice());
        api.choisen(order_id,data).then(res => {
            if (res) {
                dispatch(isChosen({isAuth: true, isChoice: true, isLoadChoice: true}));
            } else {
                dispatch(logout());
            }
        })
    };
}

export function processChoice() {
    return{
        type: CHOICE_PROCESS
    }
}

export function isChosen(data) {
    return{
        type: CHOICE_SELECTED,
        payload: data
    }
}

export function choiceLoading() {
    return {
        type: CHOICE_LOADING
    }
}

export function choiceLoaded(data) {
    return {
        type: CHOICE_LOADED,
        payload: data,
    }
}