import { Injectable, Module, OnModuleInit } from '@nestjs/common';
import { TemplateService } from 'services/templates';

@Injectable()
export class AppService implements OnModuleInit {
  async onModuleInit() {
    let tmp = new TemplateService();
    let obj = {
      name: 'test',
      items: ['Item 1', 'Item 2', 'Item 3'],
      isSpecial: true
    };
    let tnew = await tmp.generateHtmlTemplate(obj,'szablon');
    console.log(tnew)
  }

  getHello(): string {
    return 'Hello World!';
  }
}
