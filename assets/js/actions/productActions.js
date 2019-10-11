import {logout} from "./loginActions";

export const PRODUCT_LOADING = 'PRODUCT_LOADING';
export const PRODUCT_LOADED = 'PRODUCT_LOADED';

export function productLoad() {
    return (dispatch, getState, api ) => {
        dispatch(productLoading());

        api.products().then(res => {
            if (res.needAuth) {
                dispatch(logout());
                return;
            }
            dispatch(productLoaded(res))
        });
    };
}

export function productLoading() {
    return {
        type: PRODUCT_LOADING
    }
}

export function productLoaded(data) {
    return {
        type: PRODUCT_LOADED,
        payload: data,
    }
}