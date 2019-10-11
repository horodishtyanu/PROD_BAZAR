import {PRODUCT_LOADED} from "../actions/productActions";

const initialState = {
    items: [],
    order: ''
};

export function productReducer(state = initialState, action) {
    switch (action.type) {
        case PRODUCT_LOADED:
            return { ...state, ...action.payload }
        default:
            return state
    }
}