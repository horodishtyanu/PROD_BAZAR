import React from 'react';
import { connect } from 'react-redux'
import Auth from "../components/auth";
import Products from '../components/pages/products';
import Choice from '../components/pages/choice';
import {checkToken, loginPost} from '../actions/loginActions';
import {productLoad} from "../actions/productActions";
import {choiceLoad, choicePost} from "../actions/choiceAction";

class App extends React.Component {
    componentDidMount() {
        this.props.checkToken();
    }

    render() {
        const { showAuthForm, isAuth, showChoiceForm, isLoadChoice, choices, products, loginPost, choicePost, loadChoice, loadData } = this.props;
        return (
            <div className="activation-body">
                { showAuthForm && (<Auth login={loginPost}/>)}
                { isAuth && showChoiceForm && (<Choice {...choices} loadChoice={loadChoice} choicePost={choicePost}/>)}
                { isAuth && !showChoiceForm && (<Products {...products} loadData={loadData}/>)}
            </div>
        );
    }
}

const mapStateToProps = store => {
    return {
        showAuthForm: !store.user.isAuth && !store.user.token,
        isAuth: store.user.isAuth,
        showChoiceForm: !store.choice.isChoice && !store.user.isChoice,
        isLoadChoice: store.choice.isLoadChoice,
        choices: store.choice,
        products: store.products,
    }
};

const mapDispatchToProps = dispatch => {
    return {
        loginPost: (authData) => {
            dispatch(loginPost(authData))
        },
        loadChoice: () => {
            dispatch(choiceLoad())
        },
        choicePost: (order_id,result) => {
            dispatch(choicePost(order_id,result))
        },
        loadData: () => {
            dispatch(productLoad())
        },
        checkToken: () => {
            dispatch(checkToken())
        },
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(App)
