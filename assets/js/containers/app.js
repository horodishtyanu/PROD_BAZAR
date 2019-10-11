import React from 'react';
import { connect } from 'react-redux'
import Auth from "../components/auth";
import Products from '../components/pages/products';
import {checkToken, loginPost} from '../actions/loginActions'
import {productLoad} from "../actions/productActions";

class App extends React.Component {
    componentDidMount() {
        this.props.checkToken();
    }

    render() {
        const { showAuthForm, isAuth, products, loginPost, loadData } = this.props;
        return (
            <div className="activation-body">
                { showAuthForm && (<Auth login={loginPost}/>)}
                { isAuth && (<Products {...products} loadData={loadData}/>)}
            </div>
        );
    }
}

const mapStateToProps = store => {
    return {
        showAuthForm: !store.user.isAuth && !store.user.token,
        isAuth: store.user.isAuth,
        products: store.products,
    }
};

const mapDispatchToProps = dispatch => {
    return {
        loginPost: (authData) => {
            dispatch(loginPost(authData))
        },
        loadData: () => {
            dispatch(productLoad())
        },
        checkToken: () => {
            dispatch(checkToken())
        }
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(App)
