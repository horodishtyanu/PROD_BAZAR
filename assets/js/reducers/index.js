import { combineReducers } from 'redux'
import { productReducer } from './products'
import { userReducer } from './user'
import { choiceReducer } from "./choice";

export const rootReducer = combineReducers({
    products: productReducer,
    user: userReducer,
    choice: choiceReducer
});