import React from 'react';

class Choice extends React.Component{

    componentDidMount(){
        this.props.loadData();
    }

    render(){
        const {items, order} = this.props;

    }
}