import {CHOICE_LOADED} from "../actions/choiceAction";
import {CHOICE_PROCESS} from "../actions/choiceAction";
import {CHOICE_LOADING} from "../actions/choiceAction";
import {CHOICE_SELECTED} from "../actions/choiceAction";

const initialState = {
    items: [],
    order_id: '',
    isChoice: false,
    isLoadChoice: true
};

export function choiceReducer(state = initialState, action) {
    switch (action.type) {
        case CHOICE_LOADING:
            return { ...state, ...action.payload }
        case CHOICE_LOADED:
            return { ...state, ...action.payload }
        case CHOICE_PROCESS:
            return { ...state, ...action.payload }
        case CHOICE_SELECTED:
            return { ...state, ...action.payload }
        default:
            return state
    }
}