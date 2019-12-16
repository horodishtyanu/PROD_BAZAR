import React from 'react';
import { Form, Field } from 'react-final-form'

class Auth extends React.Component {
    submitAuth(value) {
        let result = {
            code: value.code,
            phone: value.phone,
        };
        this.props.login(result);
    }

    clearInt(phone) {
        return phone.replace(/[^\d]/g, "");
    }

    parsePhone(value) {
        if (!value) return value;
        const onlyNums = this.clearInt(value);

        return onlyNums;
    }

    formatPhone(value, name) {
        if (!value) return value;
        const pattern = '+7 (___) -___ - ____';
        let result = '';

        let j = 0;
        for (let i = 0; i < pattern.length; i++) {
            let iNum = value.slice(j, j + 1);
            let iPatt = pattern.slice(i, i + 1);
            if (iPatt == '_' || iPatt == iNum ) {
                iPatt = iNum;
                j++;
            } else if(i == 1 && iPatt == '7' && iNum == '8' ) {
                j++;
            }
            result += iPatt;
            if (j >= value.length) {
                break;
            }
        }

        return result;
    }

    parseCode(value) {
        return value.slice(0, 16);

    }

    validate(values) {
        const errors = {}
        if (!values.code) {
            errors.code = 'Required'
        }
        if (!values.phone) {
            errors.phone = 'Required'
        } else if (this.parsePhone(values.phone).length < 10) {
            errors.phone = 'less then 10'
        }
        return errors
    }

    render() {
        return (
            <React.Fragment>
                <div className="activation-logo">
                    <img src="img/logo.svg" alt=""/>
                </div>
                <div className="activation-title">Активация сервисного<br/> пакета</div>
                <Form onSubmit={this.submitAuth.bind(this)}
                      // initialValues={{ code: ['9ZupRiMhGxVdzebp'], phone: '79606846343' }}
                      validate={this.validate.bind(this)}
                      render={({ handleSubmit, form, submitting, pristine, values }) => (
                          <form onSubmit={handleSubmit} className="activation-inputs">
                              <div className="activation-input-block">
                                  <div className="activation-input-title">Введите код активации полученный на чеке или в СМС</div>
                                  <div className="activation-input-wrapp">
                                      <label className="input-block">
                                          <Field
                                              name="code"
                                              component="input"
                                              type="text"
                                              placeholder="_______"
                                              className="input"
                                              parse={this.parseCode.bind(this)}
                                          />
                                      </label>
                                  </div>
                              </div>
                              <div className="activation-input-block">
                                  <div className="activation-input-title">Ваш номер телефона</div>
                                  <div className="activation-input-wrapp">
                                      <label className="input-block">
                                          <Field
                                              name="phone"
                                              component="input"
                                              type="tel"
                                              placeholder="+7 (___) - ___ -  ____"
                                              className="input"
                                              parse={this.parsePhone.bind(this)}
                                              format={this.formatPhone}
                                          />
                                      </label>
                                  </div>
                              </div>
                              <div className="activation-submit-block">
                                  <button className="btn" type="submit" disabled={submitting || pristine}>
                                      Войти
                                  </button>
                              </div>
                          </form>
                      )}
                />
            </React.Fragment>
        );
    }
}

export default Auth;