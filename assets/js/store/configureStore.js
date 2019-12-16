import { createStore, applyMiddleware } from 'redux'
import { rootReducer } from '../reducers'
import logger from 'redux-logger'
import thunk from 'redux-thunk'
import ClientApi from '../utils/api/client';

const api = new ClientApi();

const middleware = process.env.NODE_ENV === 'production'
    ? applyMiddleware(thunk.withExtraArgument(api))
    : applyMiddleware(thunk.withExtraArgument(api), logger);

export const store = createStore(rootReducer, middleware);