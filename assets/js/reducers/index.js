import { combineReducers } from 'redux'
import { productReducer } from './products'
import { userReducer } from './user'

export const rootReducer = combineReducers({
    products: productReducer,
    user: userReducer,
});