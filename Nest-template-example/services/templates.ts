import { Injectable } from '@nestjs/common';
import * as fs from 'fs';
import * as handlebars from 'handlebars';

@Injectable()
export class TemplateService {
  async generateHtmlTemplate(data: any, code: string): Promise<string> {
      const path = require('path');
      const htmlTemplate = fs.readFileSync(
        path.resolve(__dirname, '../../templates/'+code+'.hbs'),
        'utf-8',
      );

    const template = handlebars.compile(htmlTemplate);
    const html = template(data);
    return html;
  }
}
